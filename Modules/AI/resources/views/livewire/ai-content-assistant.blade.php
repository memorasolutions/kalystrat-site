<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0"><i data-lucide="sparkles" class="me-2"></i>Assistant IA contenu</h5>
    </div>

    <div class="card-body">
        <div class="mb-3">
            <label for="contentInput" class="form-label">Contenu à traiter</label>
            <textarea
                id="contentInput"
                wire:model="content"
                class="form-control"
                rows="6"
                placeholder="{{ __('Saisissez votre contenu ici...') }}"
            ></textarea>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <label for="actionSelect" class="form-label">Action</label>
                <select id="actionSelect" wire:model.live="action" class="form-select">
                    <option value="rewrite">{{ __('Reecrire') }}</option>
                    <option value="improve">{{ __('Ameliorer') }}</option>
                    <option value="summarize">{{ __('Resumer') }}</option>
                    <option value="translate">{{ __('Traduire') }}</option>
                </select>
            </div>

            @if($action === 'rewrite')
            <div class="col-md-4">
                <label for="styleSelect" class="form-label">Style</label>
                <select id="styleSelect" wire:model="style" class="form-select">
                    <option value="professional">{{ __('Professionnel') }}</option>
                    <option value="casual">{{ __('Decontracte') }}</option>
                    <option value="formal">{{ __('Formel') }}</option>
                    <option value="creative">{{ __('Creatif') }}</option>
                </select>
            </div>
            @endif

            @if($action === 'translate')
            <div class="col-md-4">
                <label for="localeSelect" class="form-label">Langue cible</label>
                <select id="localeSelect" wire:model="targetLocale" class="form-select">
                    <option value="fr">Français</option>
                    <option value="en">English</option>
                    <option value="es">Español</option>
                </select>
            </div>
            @endif
        </div>

        <div class="d-grid mb-4">
            <button
                type="button"
                wire:click="process"
                class="btn btn-primary"
                wire:loading.attr="disabled"
            >
                <span wire:loading.remove wire:target="process">Traitement IA</span>
                <span wire:loading wire:target="process">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Traitement en cours...
                </span>
            </button>
        </div>

        @if(!empty($result))
        <div class="border rounded p-3 bg-light">
            <label class="form-label fw-bold">Résultat</label>
            <textarea readonly class="form-control mb-3" rows="6">{{ $result }}</textarea>

            <div class="d-flex gap-2">
                <button type="button" wire:click="applyResult" class="btn btn-success">
                    <i data-lucide="check" class="me-1"></i>Appliquer
                </button>
                <button type="button" wire:click="clear" class="btn btn-outline-secondary">
                    <i data-lucide="x" class="me-1"></i>Effacer
                </button>
            </div>
        </div>
        @endif
    </div>
</div>
