<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Privacy\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Privacy\Models\CookieCategory;

/**
 * Seeder aligné sur les 5 catégories de privacy.categories config + cahier
 * des charges RGPD + Loi 25 + ePrivacy mai 2026 :
 *  1. essential (toujours actif, non désactivable)
 *  2. analytics (GA4, Plausible)
 *  3. marketing (Meta Pixel, Google Ads)
 *  4. personalization (préférences UI, langue, thème)
 *  5. third_party (YouTube, Mapbox, Intercom, widgets externes)
 *
 * L'ancienne catégorie 'functional' (v0.5) est désactivée sans suppression
 * pour préserver l'historique des consentements existants (UserConsent::choices).
 */
class CookieCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'essential',
                'label' => 'Cookies essentiels',
                'description' => 'Nécessaires au fonctionnement du site. Session, CSRF, sécurité. Non désactivables.',
                'required' => true,
                'order' => 1,
            ],
            [
                'name' => 'analytics',
                'label' => 'Cookies analytiques',
                'description' => "Mesure d'audience et statistiques de visite anonymisées (Google Analytics, Plausible).",
                'required' => false,
                'order' => 2,
            ],
            [
                'name' => 'marketing',
                'label' => 'Cookies marketing et publicité',
                'description' => 'Publicités personnalisées et suivi inter-sites (Meta Pixel, Google Ads).',
                'required' => false,
                'order' => 3,
            ],
            [
                'name' => 'personalization',
                'label' => 'Cookies de personnalisation',
                'description' => 'Préférences UI : langue, thème, paramètres affichage utilisateur.',
                'required' => false,
                'order' => 4,
            ],
            [
                'name' => 'third_party',
                'label' => 'Tiers embarqués',
                'description' => 'Contenus tiers intégrés : YouTube, Mapbox, Intercom, widgets externes.',
                'required' => false,
                'order' => 5,
            ],
        ];

        // Désactive l'ancienne catégorie 'functional' (renommée 'personalization' en v0.6)
        // sans suppression pour préserver historique consentements (UserConsent::choices).
        CookieCategory::where('name', 'functional')->update(['is_active' => false]);

        foreach ($categories as $cat) {
            CookieCategory::updateOrCreate(
                ['name' => $cat['name']],
                $cat + ['is_active' => true]
            );
        }
    }
}
