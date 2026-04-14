<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('backoffice::themes.backend.layouts.admin', ['title' => __('Demande') . ' ' . $rightsRequest->reference, 'subtitle' => __('Vie privée')])

@section('content')

<div class="row g-3">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-header py-3 px-4 border-bottom d-flex align-items-center justify-content-between">
                <h5 class="fw-bold mb-0">
                    <i data-lucide="file-text" class="icon-sm me-1"></i> {{ $rightsRequest->reference }}
                </h5>
                <a href="{{ route('admin.privacy.rights-requests.index') }}"
                   class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-2">
                    <i data-lucide="arrow-left" class="icon-sm"></i> {{ __('Retour') }}
                </a>
            </div>
            <div class="p-4">
                <div class="mb-3">
                    <strong>{{ __('Type') }} :</strong>
                    <span class="badge bg-secondary">{{ __($rightsRequest->request_type) }}</span>
                </div>
                <div class="mb-3">
                    <strong>{{ __('Nom') }} :</strong> {{ $rightsRequest->name }}
                </div>
                <div class="mb-3">
                    <strong>{{ __('Email') }} :</strong> {{ $rightsRequest->email }}
                </div>
                <div class="mb-3">
                    <strong>{{ __('Description') }} :</strong>
                    <p class="mb-0 mt-1">{{ $rightsRequest->description }}</p>
                </div>
                @if ($rightsRequest->file_path)
                    <div class="mb-3">
                        <strong>{{ __('Pièce jointe') }} :</strong>
                        <a href="{{ Storage::url($rightsRequest->file_path) }}" target="_blank" class="btn btn-sm btn-outline-primary ms-2">
                            <i data-lucide="paperclip" class="icon-sm"></i> {{ __('Télécharger') }}
                        </a>
                    </div>
                @endif
                <div class="mb-3">
                    <strong>{{ __('Soumise le') }} :</strong> {{ $rightsRequest->created_at->format('d/m/Y H:i') }}
                </div>
                <div>
                    <strong>{{ __('Échéance') }} :</strong>
                    @if ($rightsRequest->deadline_at)
                        <span class="{{ $rightsRequest->deadline_at->lt(now()) ? 'text-danger fw-bold' : '' }}">
                            {{ $rightsRequest->deadline_at->format('d/m/Y H:i') }}
                        </span>
                    @else
                        -
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card mb-3">
            <div class="card-header py-3 px-4 border-bottom">
                <h5 class="fw-semibold mb-0">{{ __('Statut') }}</h5>
            </div>
            <div class="p-4">
                @switch($rightsRequest->status)
                    @case('pending') <span class="badge bg-warning fs-6">{{ __('En attente') }}</span> @break
                    @case('processing') <span class="badge bg-info fs-6">{{ __('En cours') }}</span> @break
                    @case('completed') <span class="badge bg-success fs-6">{{ __('Terminé') }}</span> @break
                    @case('rejected') <span class="badge bg-danger fs-6">{{ __('Rejeté') }}</span> @break
                @endswitch

                @if (!in_array((string) $rightsRequest->status, ['completed', 'rejected']))
                    <hr>
                    <form method="POST" action="{{ route('admin.privacy.rights-requests.update-status', $rightsRequest) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="status" class="form-label small fw-semibold">{{ __('Nouveau statut') }}</label>
                            <select name="status" id="status" class="form-select form-select-sm" required>
                                <option value="processing" {{ $rightsRequest->status == 'processing' ? 'selected' : '' }}>{{ __('En cours') }}</option>
                                <option value="completed">{{ __('Terminé') }}</option>
                                <option value="rejected">{{ __('Rejeté') }}</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="admin_notes" class="form-label small fw-semibold">{{ __('Notes admin') }}</label>
                            <textarea name="admin_notes" id="admin_notes" class="form-control form-control-sm" rows="3">{{ old('admin_notes', $rightsRequest->admin_notes) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm w-100">
                            <i data-lucide="save" class="icon-sm"></i> {{ __('Mettre à jour') }}
                        </button>
                    </form>
                @else
                    <hr>
                    @if ($rightsRequest->admin_notes)
                        <div>
                            <strong class="small">{{ __('Notes admin') }} :</strong>
                            <p class="small text-muted mb-0 mt-1">{{ $rightsRequest->admin_notes }}</p>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
