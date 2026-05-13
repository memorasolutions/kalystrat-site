<?php

declare(strict_types=1);

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\View\View;

class FilialeController extends Controller
{
    /**
     * Métadonnées centralisées des 6 filiales Kalystrat.
     * Source : .plan_affaire/PLAN D'ALI.md (avril 2026).
     */
    public const FILIALES = [
        'fondations' => [
            'nom_court' => 'Kalystrat Fondations',
            'nom_legal' => 'Kalystrat Fondations Inc.',
            'specialite' => 'Fondations, coffrage et excavation',
            'tagline' => 'L\'amont de la structure : fondations solides pour bâtiments durables',
            'services' => [
                'Excavation de terrain et nivellement',
                'Coffrage de fondations (résidentiel et commercial)',
                'Coulée de béton',
                'Imperméabilisation de fondations',
                'Installation de drains français',
                'Dalles de sous-sol et de garage',
                'Murs de soutènement',
                'Réparation de fondations',
            ],
            'cibles' => 'Promoteurs résidentiels, entrepreneurs généraux, propriétaires (réparations), municipalités',
            'modele' => 'Contrats au projet + exécution interne pour Kalystrat Immobilier',
            'kpi' => [
                ['valeur' => '1,5 m', 'label' => 'Profondeur min sous ligne de gel'],
                ['valeur' => '35 MPa', 'label' => 'Béton structural résidentiel'],
                ['valeur' => '100%', 'label' => 'Code QC 2026 conforme'],
            ],
            'synergies' => ['structure', 'toiture-enveloppe', 'placement-construction'],
        ],
        'structure' => [
            'nom_court' => 'Kalystrat Structure',
            'nom_legal' => 'Kalystrat Structure Inc.',
            'specialite' => 'Charpente structurale (bois, acier, hybride)',
            'tagline' => 'Charpente : l\'ossature de chaque projet',
            'services' => [
                'Charpente de bois d\'œuvre (résidentiel et commercial léger)',
                'Charpente d\'acier',
                'Systèmes hybrides bois-acier',
                'Installation de poutrelles et fermes de toit',
                'Assemblage de structures préfabriquées',
            ],
            'cibles' => 'Propriétaires résidentiels (rénovation), promoteurs (condos, multilogements), commercial',
            'modele' => 'Projets de rénovation + contrats de finition pour construction neuve',
            'kpi' => [
                ['valeur' => '3 systèmes', 'label' => 'Bois, acier, hybride'],
                ['valeur' => 'R-49', 'label' => 'Toiture isolée Code 2026'],
                ['valeur' => '1,5 ach', 'label' => 'Étanchéité blower door'],
            ],
            'synergies' => ['fondations', 'toiture-enveloppe', 'finition-interieure'],
        ],
        'toiture-enveloppe' => [
            'nom_court' => 'Kalystrat Toiture et enveloppe',
            'nom_legal' => 'Kalystrat Toiture et enveloppe Inc.',
            'specialite' => 'Systèmes de toiture et enveloppe du bâtiment',
            'tagline' => 'Étanchéité, isolation, revêtement : protégez votre bâtiment',
            'services' => [
                'Toitures (membranes élastomères, TPO, EPDM, bardeaux, toits verts)',
                'Pare-air et pare-vapeur',
                'Isolation thermique',
                'Étanchéité',
                'Revêtements extérieurs (maçonnerie, bardage métallique, fibrociment, panneaux composites)',
                'Solins et drainage',
            ],
            'cibles' => 'Résidentiel, commercial (bureaux, centres commerciaux), institutionnel (écoles, hôpitaux)',
            'modele' => 'Contrats au projet + entretien récurrents + garanties prolongées',
            'kpi' => [
                ['valeur' => '20-25 ans', 'label' => 'Garantie membrane TPO/EPDM'],
                ['valeur' => '-40°C', 'label' => 'Résistance gel-dégel'],
                ['valeur' => 'R-49', 'label' => 'Isolation toiture Code 2026'],
            ],
            'synergies' => ['structure', 'finition-interieure', 'immobilier'],
        ],
        'finition-interieure' => [
            'nom_court' => 'Kalystrat Finition intérieure',
            'nom_legal' => 'Kalystrat Finition intérieure Inc.',
            'specialite' => 'Finition intérieure haut de gamme et accessible',
            'tagline' => 'Du gypse au comptoir : finition impeccable',
            'services' => [
                'Pose de gypse et tirage de joints',
                'Peinture intérieure et extérieure',
                'Installation de moulures, boiseries et cimaises',
                'Planchers (bois franc, céramique, vinyle de luxe, béton poli)',
                'Ébénisterie sur mesure',
                'Comptoirs (quartz, granit, stratifié)',
                'Portes et quincaillerie',
            ],
            'cibles' => 'Propriétaires résidentiels (rénovation), promoteurs (condos), commercial',
            'modele' => 'Rénovation (clientèle directe) + contrats de finition pour construction neuve',
            'kpi' => [
                ['valeur' => 'Sur mesure', 'label' => 'Ébénisterie et comptoirs'],
                ['valeur' => '7 corps de métier', 'label' => 'Coordonnés en interne'],
                ['valeur' => '0 sous-traitance', 'label' => 'Finition hors groupe'],
            ],
            'synergies' => ['structure', 'toiture-enveloppe', 'immobilier'],
        ],
        'immobilier' => [
            'nom_court' => 'Kalystrat Immobilier',
            'nom_legal' => 'Kalystrat Immobilier Inc.',
            'specialite' => 'Développement résidentiel et revente immobilière',
            'tagline' => 'Bras développement : demande captive pour le groupe',
            'services' => [
                'Acquisition de terrains pour développement',
                'Construction de maisons unifamiliales et multilogements',
                'Achat-rénovation-revente (flips)',
                'Constitution de portefeuille locatif',
            ],
            'cibles' => 'Acheteurs propriétés neuves, locataires, investisseurs immobiliers',
            'modele' => 'Profit sur ventes + revenus locatifs récurrents',
            'kpi' => [
                ['valeur' => '4-12 unités', 'label' => 'Focus multilogements'],
                ['valeur' => '19 G$', 'label' => 'Marché rénovation QC 2026'],
                ['valeur' => '6 filiales', 'label' => 'Demande captive interne'],
            ],
            'synergies' => ['fondations', 'toiture-enveloppe', 'finition-interieure'],
        ],
        'placement-construction' => [
            'nom_court' => 'Kalystrat Placement construction',
            'nom_legal' => 'Kalystrat Placement construction Inc.',
            'specialite' => 'Agence de placement de main-d\'œuvre construction',
            'tagline' => 'Main-d\'œuvre qualifiée CCQ : 17 000 travailleurs/an recherchés au QC',
            'services' => [
                'Recrutement de travailleurs qualifiés et semi-qualifiés',
                'Formation et intégration',
                'Gestion administrative paie, assurances, CCQ',
                'Placement temporaire et permanent',
            ],
            'cibles' => 'Filiales Kalystrat (interne) + entrepreneurs généraux, sous-traitants, promoteurs',
            'modele' => 'Marge sur taux horaire facturé (15-25%) + frais placement permanent',
            'kpi' => [
                ['valeur' => '17 000', 'label' => 'Travailleurs CCQ/an au QC'],
                ['valeur' => '24-48 h', 'label' => 'Dépannage chantier urgent'],
                ['valeur' => '100%', 'label' => 'Main-d\'œuvre certifiée CCQ'],
            ],
            'synergies' => ['fondations', 'structure', 'toiture-enveloppe'],
        ],
    ];

    public function index(): View
    {
        return view('frontend::pages.filiales-index', ['filiales' => self::FILIALES]);
    }

    public function show(string $slug): View
    {
        abort_unless(array_key_exists($slug, self::FILIALES), 404);
        return view('frontend::pages.filiale', [
            'slug' => $slug,
            'filiale' => self::FILIALES[$slug],
        ]);
    }
}
