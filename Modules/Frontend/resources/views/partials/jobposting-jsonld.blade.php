{{-- P22-S20e JobPosting JSON-LD Schema.org pour /carrieres. Désactivable en supprimant l'@include dans la vue carrieres.blade.php. AEO Google Jobs + ChatGPT/Perplexity. --}}
@php
    $jobs = [
        ['title' => 'Charpentier-menuisier', 'desc' => "Charpenterie bois et acier sur chantiers résidentiels, commerciaux et institutionnels. Carte CCQ requise."],
        ['title' => 'Couvreur', 'desc' => "Pose de toitures plates, en pente, membranes TPO/EPDM, neuf et réfection. Carte CCQ ou apprenti."],
        ['title' => 'Coffreur-bétonneur', 'desc' => "Coffrage et coulée de fondations résidentielles, commerciales, institutionnelles. Carte CCQ requise."],
        ['title' => 'Finisseur de béton', 'desc' => "Finition de dalles, planchers et surfaces de béton. Carte CCQ requise."],
        ['title' => 'Plâtrier-peintre', 'desc' => "Pose de gypse, plâtrage, peinture intérieure et extérieure. Carte CCQ requise."],
        ['title' => 'Ébéniste', 'desc' => "Ébénisterie sur mesure, armoires, finitions intérieures haut de gamme."],
    ];
@endphp
@foreach($jobs as $job)
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "JobPosting",
    "title": "{{ $job['title'] }}",
    "description": "{{ $job['desc'] }}",
    "datePosted": "{{ now()->format('Y-m-d') }}",
    "validThrough": "{{ now()->addMonths(6)->format('Y-m-d') }}",
    "employmentType": ["FULL_TIME"],
    "industry": "Construction",
    "hiringOrganization": {
        "@@type": "Organization",
        "name": "Kalystrat Placement Construction Inc.",
        "sameAs": "{{ url('/filiales/placement') }}",
        "logo": "{{ asset('assets/img/kalystrat/logo-header.svg') }}"
    },
    "jobLocation": {
        "@@type": "Place",
        "address": {
            "@@type": "PostalAddress",
            "addressLocality": "Québec",
            "addressRegion": "QC",
            "addressCountry": "CA"
        }
    },
    "applicantLocationRequirements": {
        "@@type": "Country",
        "name": "Canada"
    },
    "directApply": true,
    "url": "{{ url('/carrieres') }}"
}
</script>
@endforeach
