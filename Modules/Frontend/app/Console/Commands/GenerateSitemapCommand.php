<?php

namespace Modules\Frontend\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateSitemapCommand extends Command
{
    protected $signature = 'frontend:sitemap';

    protected $description = 'Régénère public/sitemap.xml avec URLs Kalystrat et date courante';

    public function handle(): int
    {
        $baseUrl = 'https://kalystrat.ca';
        $filiales = require module_path('Frontend', 'config/filiales.php');
        $today = now()->toDateString();

        $urls = [
            ['loc' => '/', 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => '/a-propos', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => '/services', 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['loc' => '/portfolio', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => '/contact', 'priority' => '0.6', 'changefreq' => 'yearly'],
            ['loc' => '/faq', 'priority' => '0.7', 'changefreq' => 'monthly'],
        ];

        foreach (array_keys($filiales) as $slug) {
            $urls[] = [
                'loc' => "/filiales/{$slug}",
                'priority' => '0.7',
                'changefreq' => 'monthly',
            ];
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        foreach ($urls as $url) {
            $xml .= "  <url>" . PHP_EOL;
            $xml .= "    <loc>{$baseUrl}{$url['loc']}</loc>" . PHP_EOL;
            $xml .= "    <lastmod>{$today}</lastmod>" . PHP_EOL;
            $xml .= "    <changefreq>{$url['changefreq']}</changefreq>" . PHP_EOL;
            $xml .= "    <priority>{$url['priority']}</priority>" . PHP_EOL;
            $xml .= "  </url>" . PHP_EOL;
        }

        $xml .= '</urlset>' . PHP_EOL;

        File::put(public_path('sitemap.xml'), $xml);

        $this->info("Sitemap généré : " . count($urls) . " URLs Kalystrat (date {$today})");

        return Command::SUCCESS;
    }
}
