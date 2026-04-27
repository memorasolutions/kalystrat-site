#!/bin/bash
# Kalystrat - Déploiement production cPanel
# DRY RUN par défaut — modifier DRY_RUN=0 pour exécuter
# Usage : bash .scripts/deploy-prod.sh [--rollback]
# Variables override : DRY_RUN=0 REMOTE_USER=xxx REMOTE_HOST=xxx bash .scripts/deploy-prod.sh

set -e

DRY_RUN=${DRY_RUN:-1}
REMOTE_USER=${REMOTE_USER:-kalystrat}
REMOTE_HOST=${REMOTE_HOST:-kalystrat.ca}
REMOTE_PATH=${REMOTE_PATH:-/home/kalystrat/public_html}
BRANCH=${BRANCH:-main}

SMOKE_ROUTES=("/" "/a-propos" "/services" "/portfolio" "/contact" "/faq" "/filiales/fondations")

# Mode rollback
if [[ "$1" == "--rollback" ]]; then
    LAST_TAG=$(git describe --tags --abbrev=0 2>/dev/null || echo "")
    if [[ -z "$LAST_TAG" ]]; then
        echo "ERREUR: aucun tag git trouvé pour rollback"
        exit 1
    fi
    echo "Rollback vers tag: $LAST_TAG"
    git checkout "$LAST_TAG"
    BRANCH="$LAST_TAG"
fi

# 1. Pré-vérif: working copy clean
if [[ -n $(git status --porcelain) ]]; then
    echo "ERREUR: git working copy non-clean. Commit ou stash avant deploy."
    exit 1
fi

# 2. Pré-vérif: branche correcte
CURRENT_BRANCH=$(git rev-parse --abbrev-ref HEAD)
if [[ "$CURRENT_BRANCH" != "$BRANCH" ]] && [[ "$1" != "--rollback" ]]; then
    echo "ERREUR: branche actuelle '$CURRENT_BRANCH' ≠ branche cible '$BRANCH'"
    exit 1
fi

# 3. Smoke test local
echo "===Smoke test local kalystrat.test==="
for route in "${SMOKE_ROUTES[@]}"; do
    if ! curl -sfk "https://kalystrat.test${route}" > /dev/null; then
        echo "ERREUR: smoke local échoué $route"
        exit 1
    fi
    echo "  OK: $route"
done

# 4. rsync vers prod
EXCLUDES=(
    --exclude='.git' --exclude='node_modules' --exclude='storage/logs/*'
    --exclude='storage/framework/cache/*' --exclude='storage/framework/sessions/*'
    --exclude='storage/framework/views/*' --exclude='storage/app/archive'
    --exclude='tests' --exclude='.scripts' --exclude='.themes'
    --exclude='.env' --exclude='.env.example' --exclude='.idea' --exclude='.vscode'
    --exclude='*.log' --exclude='database/database.sqlite'
)

echo "===rsync vers prod==="
if [[ $DRY_RUN -eq 1 ]]; then
    echo "[DRY RUN] rsync ${EXCLUDES[*]} -avz . ${REMOTE_USER}@${REMOTE_HOST}:${REMOTE_PATH}"
else
    rsync "${EXCLUDES[@]}" -avz . "${REMOTE_USER}@${REMOTE_HOST}:${REMOTE_PATH}"
fi

# 5-8. Commandes distantes
REMOTE_CMDS=(
    "cd ${REMOTE_PATH} && composer install --no-dev --optimize-autoloader --no-interaction"
    "cd ${REMOTE_PATH} && php artisan migrate --force"
    "cd ${REMOTE_PATH} && php artisan view:clear && php artisan config:cache && php artisan route:cache"
    "cd ${REMOTE_PATH} && php artisan frontend:sitemap"
)

echo "===Commandes distantes==="
for cmd in "${REMOTE_CMDS[@]}"; do
    if [[ $DRY_RUN -eq 1 ]]; then
        echo "[DRY RUN] ssh ${REMOTE_USER}@${REMOTE_HOST} '$cmd'"
    else
        echo "  $cmd"
        ssh "${REMOTE_USER}@${REMOTE_HOST}" "$cmd"
    fi
done

# 9. Smoke test prod
echo "===Smoke test prod kalystrat.ca==="
if [[ $DRY_RUN -eq 1 ]]; then
    echo "[DRY RUN] curl smoke 7 routes https://kalystrat.ca/*"
else
    for route in "${SMOKE_ROUTES[@]}"; do
        if ! curl -sf "https://kalystrat.ca${route}" > /dev/null; then
            echo "ERREUR: smoke prod échoué $route"
            exit 1
        fi
        echo "  OK: $route"
    done
fi

COMMIT_HASH=$(git rev-parse HEAD)
echo ""
echo "✅ SUCCESS: déploiement Kalystrat terminé"
echo "   Commit déployé : $COMMIT_HASH"
echo "   Mode : $([[ $DRY_RUN -eq 1 ]] && echo 'DRY RUN' || echo 'LIVE')"
