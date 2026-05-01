<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@graph": [
        {
            "@type": ["Organization", "LocalBusiness", "GeneralContractor"],
            "@id": "<?php echo e(config('app.url')); ?>#organization",
            "name": "Gestion Kalystrat Inc.",
            "alternateName": "Kalystrat",
            "legalName": "Gestion Kalystrat Inc.",
            "description": "Holding québécois de construction à intégration verticale regroupant six filiales spécialisées — des fondations à la finition, du placement de main-d'œuvre au développement immobilier. Conçu. Réalisé. Livré.",
            "slogan": "Conçu. Réalisé. Livré.",
            "url": "<?php echo e(config('app.url')); ?>",
            "logo": {
                "@type": "ImageObject",
                "url": "<?php echo e(config('app.url')); ?>/assets/img/kalystrat/logo-header.svg",
                "caption": "Logo Kalystrat",
                "encodingFormat": "image/svg+xml"
            },
            "image": {
                "@type": "ImageObject",
                "url": "<?php echo e(config('app.url')); ?>/assets/img/kalystrat/og-image.jpg",
                "width": 1200,
                "height": 630,
                "caption": "Kalystrat - Holding de construction québécois à intégration verticale",
                "encodingFormat": "image/jpeg"
            },
            "telephone": "+1-418-476-0987",
            "email": "info@kalystrat.ca",
            "foundingDate": "2026",
            "founder": {
                "@type": "Person",
                "name": "Ali Salomon",
                "jobTitle": "Fondateur, président et directeur général"
            },
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "Québec",
                "addressRegion": "QC",
                "addressCountry": "CA"
            },
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": 46.8139,
                "longitude": -71.2080
            },
            "openingHoursSpecification": {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
                "opens": "08:00",
                "closes": "17:00"
            },
            "knowsLanguage": ["fr", "en", "es"],
            "areaServed": {
                "@type": "AdministrativeArea",
                "name": "Province de Québec"
            },
            "priceRange": "$$$$",
            "subOrganization": [
                {
                    "@type": "Organization",
                    "@id": "<?php echo e(config('app.url')); ?>/filiales/fondations#org",
                    "name": "Kalystrat Fondations Inc.",
                    "description": "Excavation, coffrage, fondations, drains français, dalles",
                    "url": "<?php echo e(config('app.url')); ?>/filiales/fondations",
                    "parentOrganization": { "@id": "<?php echo e(config('app.url')); ?>#organization" }
                },
                {
                    "@type": "Organization",
                    "@id": "<?php echo e(config('app.url')); ?>/filiales/structure#org",
                    "name": "Kalystrat Structure Inc.",
                    "description": "Charpente bois, acier et hybride, ossature, poutrelles",
                    "url": "<?php echo e(config('app.url')); ?>/filiales/structure",
                    "parentOrganization": { "@id": "<?php echo e(config('app.url')); ?>#organization" }
                },
                {
                    "@type": "Organization",
                    "@id": "<?php echo e(config('app.url')); ?>/filiales/toiture#org",
                    "name": "Kalystrat Toiture et Enveloppe Inc.",
                    "description": "Toitures, étanchéité, isolation et revêtements",
                    "url": "<?php echo e(config('app.url')); ?>/filiales/toiture",
                    "parentOrganization": { "@id": "<?php echo e(config('app.url')); ?>#organization" }
                },
                {
                    "@type": "Organization",
                    "@id": "<?php echo e(config('app.url')); ?>/filiales/finition#org",
                    "name": "Kalystrat Finition Intérieure Inc.",
                    "description": "Finition haut de gamme et accessible : gypse, peinture, planchers, ébénisterie",
                    "url": "<?php echo e(config('app.url')); ?>/filiales/finition",
                    "parentOrganization": { "@id": "<?php echo e(config('app.url')); ?>#organization" }
                },
                {
                    "@type": ["Organization", "RealEstateAgent"],
                    "@id": "<?php echo e(config('app.url')); ?>/filiales/immobilier#org",
                    "name": "Kalystrat Immobilier Inc.",
                    "description": "Développement résidentiel, flips et portefeuille locatif",
                    "url": "<?php echo e(config('app.url')); ?>/filiales/immobilier",
                    "parentOrganization": { "@id": "<?php echo e(config('app.url')); ?>#organization" }
                },
                {
                    "@type": ["Organization", "EmploymentAgency"],
                    "@id": "<?php echo e(config('app.url')); ?>/filiales/placement#org",
                    "name": "Kalystrat Placement Construction Inc.",
                    "description": "Agence de placement de main-d'œuvre spécialisée en construction",
                    "url": "<?php echo e(config('app.url')); ?>/filiales/placement",
                    "parentOrganization": { "@id": "<?php echo e(config('app.url')); ?>#organization" }
                }
            ]
        },
        {
            "@type": "WebSite",
            "@id": "<?php echo e(config('app.url')); ?>#website",
            "url": "<?php echo e(config('app.url')); ?>",
            "name": "Kalystrat",
            "publisher": { "@id": "<?php echo e(config('app.url')); ?>#organization" },
            "inLanguage": "fr-CA"
        }
    ]
}
</script>
<?php /**PATH /Users/stephanelapointe/__IA__/_____SERVEUR_____/site_internet/kalystrat/Modules/Frontend/resources/views/partials/schema-jsonld.blade.php ENDPATH**/ ?>