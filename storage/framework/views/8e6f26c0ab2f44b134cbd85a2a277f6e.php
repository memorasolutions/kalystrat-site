<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": ["LocalBusiness", "GeneralContractor"],
      "@id": "<?php echo e(config('app.url')); ?>#localbusiness",
      "name": "Kalystrat",
      "legalName": "Kalystrat",
      "description": "Construction stratégique et développement immobilier à Québec",
      "url": "<?php echo e(config('app.url')); ?>",
      "logo": "<?php echo e(config('app.url')); ?>/assets/img/kalystrat/logo-header.svg",
      "telephone": "418-476-0987",
      "email": "info@kalystrat.ca",
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
      "availableLanguage": ["fr", "en", "es"],
      "areaServed": {
        "@type": "AdministrativeArea",
        "name": "Région métropolitaine de Québec"
      },
      "priceRange": "$$$$"
    },
    {
      "@type": "WebSite",
      "@id": "<?php echo e(config('app.url')); ?>#website",
      "url": "<?php echo e(config('app.url')); ?>",
      "name": "Kalystrat",
      "publisher": { "@id": "<?php echo e(config('app.url')); ?>#localbusiness" }
    }
  ]
}
</script>
<?php /**PATH /Users/stephanelapointe/__IA__/_____SERVEUR_____/site_internet/kalystrat/Modules/Frontend/resources/views/partials/schema-jsonld.blade.php ENDPATH**/ ?>