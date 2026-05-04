<?php

/**
 * Villes desservies par Kalystrat — pages-villes Local SEO 2026.
 * Référence : tendances GEO mai 2026 (pp_search) + plan d'affaire .plan_affaire/PLAN_ALI.txt.
 * Désactivable en commentant la route /zones-desservies/{slug} dans routes/web.php.
 */
return [
    'quebec' => [
        'slug'          => 'quebec',
        'nom'           => 'Québec',
        'nom_long'      => 'Ville de Québec',
        'region'        => 'Capitale-Nationale',
        'province'      => 'Québec',
        'meta_title'    => 'Construction Québec | Kalystrat – RBQ + 6 filiales',
        'meta_description' => 'Entrepreneur général à Québec avec 6 filiales spécialisées, accrédité RBQ. Projets résidentiels, commerciaux, patrimoniaux et multi-logements dans la Capitale-Nationale.',
        'h1'            => 'Entrepreneur général à Québec — Construction intégrée par Kalystrat',
        'intro_paragraph' => 'Située au cœur de la Capitale-Nationale, la ville de Québec comprend des arrondissements variés comme Beauport, Sainte-Foy, Sillery, Charlesbourg, La Cité-Limoilou et Les Rivières. Son climat rigoureux, marqué par des cycles de gel-dégel et d\'importantes accumulations de neige, impose des exigences techniques strictes en construction. Les sols argileux de Beauport ou le roc omniprésent à Charlesbourg représentent des défis géotechniques spécifiques. Kalystrat, entrepreneur général local, maîtrise ces contraintes grâce à son intégration verticale via ses six filiales spécialisées. Nous servons promoteurs résidentiels, entrepreneurs généraux, propriétaires, municipalités et investisseurs avec une approche « Conçu. Réalisé. Livré. » adaptée au tissu urbain et réglementaire québécois.',
        'arrondissements' => [
            'La Cité-Limoilou',
            'Sainte-Foy–Sillery–Cap-Rouge',
            'Beauport',
            'Charlesbourg',
            'Les Rivières',
            'La Haute-Saint-Charles',
        ],
        'projets_types' => [
            'Maison unifamiliale neuve',
            'Multi-logement résidentiel',
            'Rénovation patrimoniale (Vieux-Québec)',
            'Toiture après tempête hivernale',
            'Aménagement commercial',
        ],
        'reglementations' => [
            'Code de construction du Québec',
            'Régie du bâtiment du Québec (RBQ)',
            'Commission de la construction du Québec (CCQ)',
            'Règlements d\'urbanisme — Ville de Québec',
        ],
        'pourquoi_kalystrat' => [
            'Siège social local — équipes basées à Québec',
            'Connaissance fine des sols (argileux Beauport, roc Charlesbourg)',
            'Réseau RBQ + CCQ + APCHQ établi',
            'Intégration verticale six filiales — un seul interlocuteur',
        ],
        'lat'           => 46.8139,
        'lng'           => -71.2080,
        'population'    => 549459,
    ],
];
