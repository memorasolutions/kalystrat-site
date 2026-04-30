{{-- P22-S20e BreadcrumbList JSON-LD Schema.org. Désactivable en supprimant l'@include dans head.blade.php. Variables : $breadcrumbItems = [['name' => 'Accueil', 'url' => '/'], ['name' => 'Page courante', 'url' => '/page']] --}}
@php
    $breadcrumbItems = $breadcrumbItems ?? null;
    if (! $breadcrumbItems) {
        $breadcrumbItems = [['name' => 'Accueil', 'url' => url('/')]];
        if (isset($title) && url()->current() !== url('/')) {
            $breadcrumbItems[] = ['name' => $title, 'url' => url()->current()];
        }
    }
@endphp
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "BreadcrumbList",
    "itemListElement": [
        @foreach($breadcrumbItems as $idx => $item)
        {
            "@@type": "ListItem",
            "position": {{ $idx + 1 }},
            "name": "{{ $item['name'] }}",
            "item": "{{ $item['url'] }}"
        }@if(! $loop->last),@endif
        @endforeach
    ]
}
</script>
