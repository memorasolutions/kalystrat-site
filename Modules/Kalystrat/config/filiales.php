<?php

/**
 * Filiales du holding Gestion Kalystrat Inc.
 * Référence : .plan_affaire/PLAN_ALI.txt + charte v2 section 4b couleurs filiales.
 * Désactivable en commentant la route /filiales/{slug} dans routes/web.php.
 */
return [
    'fondations' => [
        'slug'        => 'fondations',
        'nom_court'   => 'Kalystrat Fondations',
        'nom_complet' => 'Kalystrat Fondations Inc.',
        'specialite'  => 'Excavation, coffrage, drains français, dalles',
        'services'    => ['Excavation et nivellement', 'Coffrage de fondations', 'Coulée de béton', 'Imperméabilisation', 'Drains français', 'Dalles de sous-sol'],
        'cibles'      => ['Promoteurs résidentiels', 'Entrepreneurs généraux', 'Propriétaires', 'Municipalités'],
        'hex_couleur' => '#6B4F2C',
        'meta_description' => 'Kalystrat Fondations à Québec : excavation, coffrage, drains français et fondations solides pour projets résidentiels et commerciaux au QC.',
    ],
    'structure' => [
        'slug'        => 'structure',
        'nom_court'   => 'Kalystrat Structure',
        'nom_complet' => 'Kalystrat Structure Inc.',
        'specialite'  => 'Charpente bois, acier et hybride',
        'services'    => ['Charpente bois d\'œuvre', 'Charpente acier', 'Systèmes hybrides bois-acier', 'Poutrelles et fermes de toit', 'Structures préfabriquées'],
        'cibles'      => ['Entrepreneurs généraux', 'Promoteurs', 'Commercial et institutionnel'],
        'hex_couleur' => '#3F4A55',
        'meta_description' => 'Kalystrat Structure à Québec : charpente bois, acier ou hybride. Solutions structurales robustes intégrées à nos projets de construction au QC.',
    ],
    'toiture' => [
        'slug'        => 'toiture',
        'nom_court'   => 'Kalystrat Toiture et Enveloppe',
        'nom_complet' => 'Kalystrat Toiture et Enveloppe Inc.',
        'specialite'  => 'Toitures, étanchéité, isolation et revêtements',
        'services'    => ['Membranes élastomères', 'Membranes TPO et EPDM', 'Bardeaux', 'Pare-air et pare-vapeur', 'Isolation thermique', 'Revêtements extérieurs (maçonnerie, bardage, fibrociment)'],
        'cibles'      => ['Propriétaires résidentiels', 'Promoteurs', 'Commercial', 'Institutionnel (écoles, hôpitaux)'],
        'hex_couleur' => '#2C4858',
        'meta_description' => 'Kalystrat Toiture et Enveloppe à Québec : membranes, isolation, revêtements. Performance énergétique et étanchéité assurées pour bâtiments au QC.',
    ],
    'finition' => [
        'slug'        => 'finition',
        'nom_court'   => 'Kalystrat Finition Intérieure',
        'nom_complet' => 'Kalystrat Finition Intérieure Inc.',
        'specialite'  => 'Finition haut de gamme et accessible',
        'services'    => ['Pose de gypse et tirage de joints', 'Peinture intérieure', 'Moulures et boiseries', 'Planchers (bois franc, céramique, vinyle de luxe)', 'Ébénisterie sur mesure', 'Comptoirs (quartz, granit)'],
        'cibles'      => ['Propriétaires résidentiels', 'Promoteurs', 'Designers d\'intérieur'],
        'hex_couleur' => '#B8A472',
        'meta_description' => 'Kalystrat Finition Intérieure à Québec : gypse, peinture, planchers, ébénisterie. Détails soignés pour des intérieurs clés en main au QC.',
    ],
    'immobilier' => [
        'slug'        => 'immobilier',
        'nom_court'   => 'Kalystrat Immobilier',
        'nom_complet' => 'Kalystrat Immobilier Inc.',
        'specialite'  => 'Développement résidentiel, flips et locatif',
        'services'    => ['Acquisition de terrains', 'Construction unifamiliale et multilogement', 'Achats-rénovations-reventes (flips)', 'Constitution portefeuille locatif'],
        'cibles'      => ['Acheteurs résidentiels', 'Investisseurs immobiliers', 'Locataires'],
        'hex_couleur' => '#2A5A4E',
        'meta_description' => 'Kalystrat Immobilier à Québec : développement résidentiel, flips et locatif. Projets pensés avec notre demande captive et intégration verticale QC.',
    ],
    'placement' => [
        'slug'        => 'placement',
        'nom_court'   => 'Kalystrat Placement Construction',
        'nom_complet' => 'Kalystrat Placement Construction Inc.',
        'specialite'  => 'Agence de placement de main-d\'œuvre construction',
        'services'    => ['Recrutement spécialisé', 'Formation et intégration', 'Gestion paie, assurances, CCQ', 'Placement temporaire et permanent'],
        'cibles'      => ['Filiales Kalystrat (clients internes)', 'Entrepreneurs généraux externes', 'Sous-traitants', 'Promoteurs'],
        'hex_couleur' => '#A66B3A',
        'meta_description' => 'Kalystrat Placement Construction à Québec : agence de main-d\'œuvre qualifiée RBQ/CCQ. Recrutement ciblé pour les besoins des filiales et partenaires au QC.',
    ],
];
