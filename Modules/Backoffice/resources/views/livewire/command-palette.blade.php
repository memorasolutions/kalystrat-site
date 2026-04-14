<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
<div x-data="{
        init() {
            this.$watch('$wire.isOpen', v => {
                if (v) this.$nextTick(() => this.$refs.searchInput.focus())
            })
        }
    }"
    x-on:keydown.window.meta.k.prevent="$wire.open()"
    x-on:keydown.window.ctrl.k.prevent="$wire.open()"
    x-on:keydown.window.escape="$wire.close()"
>
    @if ($isOpen)
    <div class="position-fixed top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-start pt-5"
         style="z-index:9999;background:rgba(0,0,0,.5);backdrop-filter:blur(4px);"
         wire:click.self="close">
        <div class="card shadow-lg border-0" style="width:100%;max-width:560px;border-radius:12px;">
            <div class="card-body p-3">
                {{-- Search input --}}
                <div class="input-group mb-3">
                    <span class="input-group-text bg-transparent border-end-0">
                        <i data-lucide="search" style="width:18px;height:18px;"></i>
                    </span>
                    <input type="text" x-ref="searchInput"
                           class="form-control border-start-0 ps-0"
                           placeholder="{{ __('Rechercher une page, action...') }}"
                           wire:model.live.debounce.300ms="query"
                           autocomplete="off">
                    <span class="input-group-text bg-transparent">
                        <kbd class="small">Esc</kbd>
                    </span>
                </div>

                {{-- Results --}}
                @if (strlen($query) >= 2)
                    @if (empty($results))
                        <div class="text-center text-muted py-4">
                            <i data-lucide="search-x" style="width:24px;height:24px;" class="mb-2"></i>
                            <p class="mb-0">{{ __('Aucun résultat pour') }} "{{ $query }}"</p>
                        </div>
                    @else
                        <div class="list-group list-group-flush" style="max-height:320px;overflow-y:auto;">
                            @foreach ($results as $result)
                                @if (isset($result['route']))
                                <button type="button"
                                        class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-0 rounded-2 mb-1"
                                        wire:click="navigate('{{ $result['route'] }}')"
                                        style="min-height:44px;">
                                    @if (! empty($result['icon']))
                                        <i data-lucide="{{ $result['icon'] }}" style="width:18px;height:18px;flex-shrink:0;" class="text-muted"></i>
                                    @else
                                        <i data-lucide="circle" style="width:18px;height:18px;flex-shrink:0;" class="text-muted"></i>
                                    @endif
                                    <span class="flex-grow-1">{{ __($result['label']) }}</span>
                                    <small class="text-muted font-monospace" style="font-size:10px;">{{ $result['route'] }}</small>
                                </button>
                                @endif
                            @endforeach
                        </div>
                    @endif
                @else
                    <div class="text-center text-muted py-3">
                        <p class="mb-0 small">{{ __('Tapez au moins 2 caractères') }}</p>
                        <p class="mb-0 small mt-1">
                            <kbd>Cmd</kbd> + <kbd>K</kbd> {{ __('pour ouvrir') }}
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @endif
</div>
