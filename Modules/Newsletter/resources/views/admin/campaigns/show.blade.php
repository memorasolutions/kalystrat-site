<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('admintabler::layouts.admin', ['title' => __('Détails campagne'), 'subtitle' => __('Newsletter')])

@section('content')

<div class="row g-3">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-header py-3 px-4 border-bottom d-flex align-items-center justify-content-between">
                <h5 class="fw-bold mb-0">{{ $campaign->subject }}</h5>
                <a href="{{ route('admin.newsletter.campaigns.index') }}"
                   class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-2">
                    <i data-lucide="arrow-left" class="icon-sm"></i> {{ __('Retour') }}
                </a>
            </div>
            <div class="p-4">
                <div class="mb-4">
                    @if ($campaign->isSent())
                        <span class="badge bg-success">{{ __('Envoyée') }}</span>
                        <span class="text-muted ms-2">{{ $campaign->sent_at->format('d/m/Y H:i') }}</span>
                        <span class="badge bg-info ms-2">{{ $campaign->recipient_count }} {{ __('destinataires') }}</span>
                    @else
                        <span class="badge bg-warning">{{ __('Brouillon') }}</span>
                    @endif
                </div>

                <div class="card bg-light mb-4">
                    <div class="card-header py-2 px-3">
                        <h6 class="fw-semibold mb-0">{{ __('Contenu') }}</h6>
                    </div>
                    <div class="card-body p-3">
                        {!! Purifier::clean($campaign->content ?? '') !!}
                    </div>
                </div>

                <div class="d-flex gap-2 pt-2">
                    @if (!$campaign->isSent())
                        <a href="{{ route('admin.newsletter.campaigns.edit', $campaign) }}" class="btn btn-primary d-flex align-items-center gap-2">
                            <i data-lucide="pencil" class="icon-sm"></i> {{ __('Modifier') }}
                        </a>
                        <form action="{{ route('admin.newsletter.campaigns.destroy', $campaign) }}" method="POST"
                              onsubmit="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer cette campagne ?') }}');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger d-flex align-items-center gap-2">
                                <i data-lucide="trash-2" class="icon-sm"></i> {{ __('Supprimer') }}
                            </button>
                        </form>
                    @endif
                    <a href="{{ route('admin.newsletter.campaigns.index') }}" class="btn btn-outline-secondary">{{ __('Retour à la liste') }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card mb-3">
            <div class="card-header py-3 px-4 border-bottom">
                <h5 class="fw-semibold mb-0">{{ __('Informations') }}</h5>
            </div>
            <div class="p-4">
                <p class="small text-muted mb-2"><strong>{{ __('Créée le') }} :</strong> {{ $campaign->created_at->format('d/m/Y H:i') }}</p>
                @if ($campaign->isSent())
                    <p class="small text-muted mb-2"><strong>{{ __('Envoyée le') }} :</strong> {{ $campaign->sent_at->format('d/m/Y H:i') }}</p>
                    <p class="small text-muted mb-0"><strong>{{ __('Destinataires') }} :</strong> {{ $campaign->recipient_count }}</p>
                @else
                    <p class="small text-muted mb-0">{{ __('Cette campagne n\'a pas encore été envoyée.') }}</p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
