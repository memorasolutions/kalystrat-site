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
        'meta_title' => 'Kalystrat Fondations Québec — Excavation & coffrage RBQ',
        'meta_description' => 'Kalystrat Fondations à Québec : excavation, coffrage, drains français et fondations solides pour projets résidentiels et commerciaux au QC.',
        'intro_paragraph' => 'Les fondations constituent l\'assise critique de tout bâtiment, déterminant sa stabilité à long terme face aux contraintes environnementales. Au Québec, les cycles de gel-dégel, les sols argileux de Beauport ou la présence de roc en Charlevoix exigent une expertise géotechnique rigoureuse et des solutions adaptées. Kalystrat Fondations conçoit chaque projet en stricte conformité avec le Code de construction du Québec et sous licence RBQ, garantissant solidité, durabilité et sécurité. Grâce à l\'intégration verticale au sein du groupe Kalystrat, nos fondations s\'articulent parfaitement avec les phases ultérieures de construction, optimisant délais, coûts et qualité pour promoteurs, entrepreneurs généraux et institutions publiques.',
        'process' => [
            'Étude de sol et planification' => 'Analyse géotechnique du site et élaboration de plans conformes au Code de construction du Québec.',
            'Excavation et nivellement' => 'Excavation précise et nivellement du terrain selon les spécifications du plan de fondation.',
            'Coffrage et coulée' => 'Installation de coffrages robustes suivie d\'une coulée de béton contrôlée et vibrée.',
            'Imperméabilisation et drainage' => 'Application d\'un système d\'imperméabilisation et installation de drains français certifiés.',
        ],
        'certifications' => [
            'Licence RBQ entrepreneur général',
            'Membre actif de l\'APCHQ',
            'Travailleurs CCQ qualifiés sur chantier',
            'Adhésion au régime de la Garantie de construction résidentielle (GCR)',
            'Conformité totale aux normes CNESST en santé-sécurité',
        ],
    ],
    'structure' => [
        'slug'        => 'structure',
        'nom_court'   => 'Kalystrat Structure',
        'nom_complet' => 'Kalystrat Structure Inc.',
        'specialite'  => 'Charpente bois, acier et hybride',
        'services'    => ['Charpente bois d\'œuvre', 'Charpente acier', 'Systèmes hybrides bois-acier', 'Poutrelles et fermes de toit', 'Structures préfabriquées'],
        'cibles'      => ['Entrepreneurs généraux', 'Promoteurs', 'Commercial et institutionnel'],
        'hex_couleur' => '#3F4A55',
        'meta_title' => 'Kalystrat Structure Québec — Charpente bois, acier, hybride',
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
        'meta_title' => 'Kalystrat Toiture & Enveloppe — Membranes TPO/EPDM Québec',
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
        'meta_title' => 'Kalystrat Finition Intérieure Québec — Gypse, peinture',
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
        'meta_title' => 'Kalystrat Immobilier Québec — Promotion résidentielle',
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
        'meta_title' => 'Kalystrat Placement Construction — Main-d\'œuvre CCQ Québec',
        'meta_description' => 'Kalystrat Placement Construction à Québec : agence de main-d\'œuvre qualifiée RBQ/CCQ. Recrutement ciblé pour les besoins des filiales et partenaires au QC.',
    ],
];
