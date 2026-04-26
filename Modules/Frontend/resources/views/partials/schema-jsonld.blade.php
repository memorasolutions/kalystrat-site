<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@graph": [
        {
            "@@type": ["Organization", "LocalBusiness", "GeneralContractor"],
            "@@id": "{{ config('app.url') }}#organization",
            "name": "Gestion Kalystrat Inc.",
            "alternateName": "Kalystrat",
            "legalName": "Gestion Kalystrat Inc.",
            "description": "Holding québécois de construction à intégration verticale regroupant six filiales spécialisées — des fondations à la finition, du placement de main-d'œuvre au développement immobilier. Conçu. Réalisé. Livré.",
            "slogan": "Conçu. Réalisé. Livré.",
            "url": "{{ config('app.url') }}",
            "logo": "{{ config('app.url') }}/assets/img/kalystrat/logo-header.svg",
            "image": "{{ config('app.url') }}/assets/img/kalystrat/logo-header.svg",
            "telephone": "+1-418-476-0987",
            "email": "info@kalystrat.ca",
            "foundingDate": "2026",
            "founder": {
                "@@type": "Person",
                "name": "Ali Salomon",
                "jobTitle": "Fondateur, président et directeur général"
            },
            "address": {
                "@@type": "PostalAddress",
                "addressLocality": "Québec",
                "addressRegion": "QC",
                "addressCountry": "CA"
            },
            "geo": {
                "@@type": "GeoCoordinates",
                "latitude": 46.8139,
                "longitude": -71.2080
            },
            "openingHoursSpecification": {
                "@@type": "OpeningHoursSpecification",
                "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
                "opens": "08:00",
                "closes": "17:00"
            },
            "knowsLanguage": ["fr", "en", "es"],
            "areaServed": {
                "@@type": "AdministrativeArea",
                "name": "Province de Québec"
            },
            "priceRange": "$$$$",
            "subOrganization": [
                {
                    "@@type": "Organization",
                    "@@id": "{{ config('app.url') }}/filiales/fondations#org",
                    "name": "Kalystrat Fondations Inc.",
                    "description": "Excavation, coffrage, fondations, drains français, dalles",
                    "url": "{{ config('app.url') }}/filiales/fondations",
                    "parentOrganization": { "@@id": "{{ config('app.url') }}#organization" }
                },
                {
                    "@@type": "Organization",
                    "@@id": "{{ config('app.url') }}/filiales/structure#org",
                    "name": "Kalystrat Structure Inc.",
                    "description": "Charpente bois, acier et hybride, ossature, poutrelles",
                    "url": "{{ config('app.url') }}/filiales/structure",
                    "parentOrganization": { "@@id": "{{ config('app.url') }}#organization" }
                },
                {
                    "@@type": "Organization",
                    "@@id": "{{ config('app.url') }}/filiales/toiture#org",
                    "name": "Kalystrat Toiture et Enveloppe Inc.",
                    "description": "Toitures, étanchéité, isolation et revêtements",
                    "url": "{{ config('app.url') }}/filiales/toiture",
                    "parentOrganization": { "@@id": "{{ config('app.url') }}#organization" }
                },
                {
                    "@@type": "Organization",
                    "@@id": "{{ config('app.url') }}/filiales/finition#org",
                    "name": "Kalystrat Finition Intérieure Inc.",
                    "description": "Finition haut de gamme et accessible : gypse, peinture, planchers, ébénisterie",
                    "url": "{{ config('app.url') }}/filiales/finition",
                    "parentOrganization": { "@@id": "{{ config('app.url') }}#organization" }
                },
                {
                    "@@type": ["Organization", "RealEstateAgent"],
                    "@@id": "{{ config('app.url') }}/filiales/immobilier#org",
                    "name": "Kalystrat Immobilier Inc.",
                    "description": "Développement résidentiel, flips et portefeuille locatif",
                    "url": "{{ config('app.url') }}/filiales/immobilier",
                    "parentOrganization": { "@@id": "{{ config('app.url') }}#organization" }
                },
                {
                    "@@type": ["Organization", "EmploymentAgency"],
                    "@@id": "{{ config('app.url') }}/filiales/placement#org",
                    "name": "Kalystrat Placement Construction Inc.",
                    "description": "Agence de placement de main-d'œuvre spécialisée en construction",
                    "url": "{{ config('app.url') }}/filiales/placement",
                    "parentOrganization": { "@@id": "{{ config('app.url') }}#organization" }
                }
            ]
        },
        {
            "@@type": "WebSite",
            "@@id": "{{ config('app.url') }}#website",
            "url": "{{ config('app.url') }}",
            "name": "Kalystrat",
            "publisher": { "@@id": "{{ config('app.url') }}#organization" },
            "inLanguage": "fr-CA"
        }
    ]
}
</script>
