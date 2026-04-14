<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@extends('backoffice::layouts.admin', ['title' => __('Étapes onboarding'), 'subtitle' => __('Gestion')])

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
@endif

<div class="card">
    <div class="card-body p-0">
        <table class="table table-sm mb-0">
            <thead>
                <tr>
                    <th>{{ __('Ordre') }}</th>
                    <th>{{ __('Slug') }}</th>
                    <th>{{ __('Titre') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Active') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($steps as $step)
                <tr>
                    <td>{{ $step->order }}</td>
                    <td><code>{{ $step->slug }}</code></td>
                    <td>{{ $step->title }}</td>
                    <td>{{ Str::limit($step->description, 50) }}</td>
                    <td>
                        <span class="badge {{ $step->is_active ? 'bg-success' : 'bg-danger' }}">{{ $step->is_active ? __('Oui') : __('Non') }}</span>
                    </td>
                    <td>
                        <a href="{{ route('admin.onboarding-steps.edit', $step) }}" class="btn btn-sm btn-outline-primary">{{ __('Modifier') }}</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
