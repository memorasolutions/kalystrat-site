<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
<x-mail::message>
# Digest conversations - {{ config('app.name') }}

**Période :** {{ $stats['period'] }}
**Plage :** {{ $stats['date_range'] }}

---

**{{ $stats['conversations_count'] }}** conversations | **{{ $stats['messages_count'] }}** messages | **{{ $stats['leads_count'] }}** leads | **{{ $stats['unresolved_count'] }}** non résolues

@if(isset($stats['top_themes']) && count($stats['top_themes']) > 0)
## Thèmes principaux
@foreach($stats['top_themes'] as $theme => $count)
- **{{ $theme }}** ({{ $count }})
@endforeach

---
@endif

@if($stats['conversations_count'] > 0)
@foreach($stats['conversations'] as $conversation)
<x-mail::panel>
@if(in_array($conversation['id'], $stats['unresolved_ids'] ?? []))
**{{ $conversation['title'] }}** - {{ $conversation['created_at'] }}
@else
**{{ $conversation['title'] }}** - {{ $conversation['created_at'] }}
@endif
{{ $conversation['user_id'] ? 'Client authentifié (#' . $conversation['user_id'] . ')' : 'Visiteur anonyme' }} | {{ $conversation['message_count'] }} messages

@foreach($conversation['exchanges'] as $exchange)
**{{ $exchange['role'] }}** ({{ $exchange['created_at'] }}) : {{ Str::limit($exchange['content'], 200) }}

@endforeach
</x-mail::panel>
@endforeach
@else
Aucune conversation durant cette période.
@endif

<x-mail::button :url="url('/admin')">
Accéder à l'administration
</x-mail::button>

{{ config('app.name') }}
</x-mail::message>
