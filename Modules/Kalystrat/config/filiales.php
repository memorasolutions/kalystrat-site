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
    ],
    'structure' => [
        'slug'        => 'structure',
        'nom_court'   => 'Kalystrat Structure',
        'nom_complet' => 'Kalystrat Structure Inc.',
        'specialite'  => 'Charpente bois, acier et hybride',
        'services'    => ['Charpente bois d\'œuvre', 'Charpente acier', 'Systèmes hybrides bois-acier', 'Poutrelles et fermes de toit', 'Structures préfabriquées'],
        'cibles'      => ['Entrepreneurs généraux', 'Promoteurs', 'Commercial et institutionnel'],
        'hex_couleur' => '#3F4A55',
    ],
    'toiture' => [
        'slug'        => 'toiture',
        'nom_court'   => 'Kalystrat Toiture et Enveloppe',
        'nom_complet' => 'Kalystrat Toiture et Enveloppe Inc.',
        'specialite'  => 'Toitures, étanchéité, isolation et revêtements',
        'services'    => ['Membranes élastomères', 'Membranes TPO et EPDM', 'Bardeaux', 'Pare-air et pare-vapeur', 'Isolation thermique', 'Revêtements extérieurs (maçonnerie, bardage, fibrociment)'],
        'cibles'      => ['Propriétaires résidentiels', 'Promoteurs', 'Commercial', 'Institutionnel (écoles, hôpitaux)'],
        'hex_couleur' => '#2C4858',
    ],
    'finition' => [
        'slug'        => 'finition',
        'nom_court'   => 'Kalystrat Finition Intérieure',
        'nom_complet' => 'Kalystrat Finition Intérieure Inc.',
        'specialite'  => 'Finition haut de gamme et accessible',
        'services'    => ['Pose de gypse et tirage de joints', 'Peinture intérieure', 'Moulures et boiseries', 'Planchers (bois franc, céramique, vinyle de luxe)', 'Ébénisterie sur mesure', 'Comptoirs (quartz, granit)'],
        'cibles'      => ['Propriétaires résidentiels', 'Promoteurs', 'Designers d\'intérieur'],
        'hex_couleur' => '#B8A472',
    ],
    'immobilier' => [
        'slug'        => 'immobilier',
        'nom_court'   => 'Kalystrat Immobilier',
        'nom_complet' => 'Kalystrat Immobilier Inc.',
        'specialite'  => 'Développement résidentiel, flips et locatif',
        'services'    => ['Acquisition de terrains', 'Construction unifamiliale et multilogement', 'Achats-rénovations-reventes (flips)', 'Constitution portefeuille locatif'],
        'cibles'      => ['Acheteurs résidentiels', 'Investisseurs immobiliers', 'Locataires'],
        'hex_couleur' => '#2A5A4E',
    ],
    'placement' => [
        'slug'        => 'placement',
        'nom_court'   => 'Kalystrat Placement Construction',
        'nom_complet' => 'Kalystrat Placement Construction Inc.',
        'specialite'  => 'Agence de placement de main-d\'œuvre construction',
        'services'    => ['Recrutement spécialisé', 'Formation et intégration', 'Gestion paie, assurances, CCQ', 'Placement temporaire et permanent'],
        'cibles'      => ['Filiales Kalystrat (clients internes)', 'Entrepreneurs généraux externes', 'Sous-traitants', 'Promoteurs'],
        'hex_couleur' => '#A66B3A',
    ],
];
