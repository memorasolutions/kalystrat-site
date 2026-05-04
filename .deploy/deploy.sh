#!/bin/bash
# Déploiement Laravel 12 sur cPanel mutualisé.
# Usage : bash .deploy/deploy.sh [--first-deploy]
# Le flag --first-deploy lance aussi db:seed pour créer le superadmin.

set -euo pipefail

# ENV (à ajuster selon le compte cPanel)
SITE_URL="kalystrat.ca"
BACKUP_DIR="$HOME/backups"
DEPLOY_DIR="$HOME/kalystrat"
LOG_FILE="$DEPLOY_DIR/.deploy/deploy.log"

RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m'

log()     { echo -e "[$(date +'%Y-%m-%d %H:%M:%S')] $1" | tee -a "$LOG_FILE"; }
error()   { log "${RED}ERROR: $1${NC}"; exit 1; }
success() { log "${GREEN}$1${NC}"; }
warning() { log "${YELLOW}WARNING: $1${NC}"; }

cd "$DEPLOY_DIR" || error "Deploy directory not found: $DEPLOY_DIR"
mkdir -p "$BACKUP_DIR"

# Snapshot pre-deploy (rollback rapide)
SNAPSHOT_NAME="snapshot_$(date +%Y%m%d_%H%M%S).tar.gz"
log "Creating snapshot: $SNAPSHOT_NAME"
tar -czf "$BACKUP_DIR/$SNAPSHOT_NAME" .env storage/ public/build/ .git/HEAD .git/refs/heads/master 2>/dev/null \
  || warning "Snapshot partial (some paths missing)"

# Git pull
log "Fetching latest changes..."
git fetch origin master || error "Git fetch failed"
CURRENT_COMMIT=$(git rev-parse HEAD)
git checkout -q master || error "Git checkout failed"
git pull --ff-only origin master || error "Git pull failed (non-fast-forward)"
NEW_COMMIT=$(git rev-parse HEAD)

if [ "$CURRENT_COMMIT" = "$NEW_COMMIT" ]; then
    warning "No new commits. Skipping build steps."
    exit 0
fi

log "Composer install (no-dev, optimized)..."
composer install --no-dev --optimize-autoloader --quiet || error "Composer install failed"

php artisan down --retry=15 || error "Failed to enable maintenance mode"

# Rollback en cas d'échec smoke
rollback() {
    log "Rolling back to commit $CURRENT_COMMIT..."
    git checkout -q "$CURRENT_COMMIT" --force || true
    tar -xzf "$BACKUP_DIR/$SNAPSHOT_NAME" -C "$DEPLOY_DIR" .env storage/ public/build/ 2>/dev/null || true
    composer install --no-dev --optimize-autoloader --quiet || true
    php artisan config:clear; php artisan route:clear; php artisan view:clear; php artisan event:clear
    php artisan up >/dev/null 2>&1 || true
    error "Deployment rolled back (smoke test failed)"
}

log "Running migrations..."
php artisan migrate --force || { rollback; }

if [[ "${1:-}" == "--first-deploy" ]]; then
    log "Running first-deploy seed (superadmin + settings)..."
    php artisan db:seed --force || { rollback; }
fi

log "Caching config / routes / views / events..."
php artisan config:cache || { rollback; }
php artisan route:cache  || { rollback; }
php artisan view:cache   || { rollback; }
php artisan event:cache  || { rollback; }

php artisan storage:link 2>/dev/null || true  # idempotent

php artisan up || error "Failed to disable maintenance mode"

# Smoke test critique : 3 routes publiques principales
log "Smoke test (HTTP 200 sur 3 routes)..."
for endpoint in "" "services" "contact"; do
    URL="https://$SITE_URL/${endpoint}"
    STATUS=$(curl -s -o /dev/null -w "%{http_code}" -L "$URL" || echo "000")
    if [ "$STATUS" != "200" ]; then
        log "  $URL -> $STATUS (échec)"
        rollback
    else
        log "  $URL -> 200"
    fi
done

success "Deployment OK. $CURRENT_COMMIT -> $NEW_COMMIT"
log "Snapshot conservé : $BACKUP_DIR/$SNAPSHOT_NAME"
