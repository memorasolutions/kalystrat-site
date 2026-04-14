<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateModuleReadmesCommand extends Command
{
    protected $signature = 'app:generate-module-readmes {--force : Overwrite existing READMEs}';

    protected $description = 'Generate a README.md for each nwidart module in Modules/';

    public function handle(): int
    {
        $modulesPath = base_path('Modules');
        if (! File::exists($modulesPath)) {
            $this->components->error('Modules directory does not exist.');

            return self::FAILURE;
        }

        $moduleDirs = collect(File::directories($modulesPath))
            ->map(fn ($path) => basename($path))
            ->sort()
            ->values();

        $rows = [];

        foreach ($moduleDirs as $moduleName) {
            $modulePath = $modulesPath.'/'.$moduleName;

            $moduleData = $this->readModuleJson($modulePath.'/module.json');
            $description = ! empty($moduleData['description'])
                ? $moduleData['description']
                : "Module {$moduleName} du template MEMORA.";

            $controllerCount = $this->countPhpFiles($modulePath.'/app/Http/Controllers');
            $modelCount = $this->countPhpFiles($modulePath.'/app/Models');
            $migrationCount = $this->countPhpFiles($modulePath.'/database/migrations');
            $testCount = $this->countTestFiles($modulePath.'/tests');
            $webRoutesCount = $this->countRouteCalls($modulePath.'/routes/web.php');
            $apiRoutesCount = $this->countRouteCalls($modulePath.'/routes/api.php');
            $configExists = File::exists($modulePath.'/config/config.php');

            $readmePath = $modulePath.'/README.md';
            $readmeExists = File::exists($readmePath);

            $skip = false;
            if ($readmeExists && ! $this->option('force')) {
                $currentContent = File::get($readmePath);
                if (! str_contains($currentContent, 'TODO:')) {
                    $skip = true;
                }
            }

            if ($skip) {
                $status = 'skipped';
            } else {
                $content = $this->buildReadme(
                    $moduleName, $description, $controllerCount, $modelCount,
                    $migrationCount, $testCount, $configExists, $webRoutesCount, $apiRoutesCount
                );
                File::put($readmePath, $content);
                $status = $readmeExists ? 'updated' : 'created';
            }

            $rows[] = [$moduleName, $readmeExists ? 'yes' : 'no', $status];
        }

        $this->table(['Module', 'README', 'Status'], $rows);

        return self::SUCCESS;
    }

    /** @return array<string, mixed> */
    private function readModuleJson(string $path): array
    {
        if (! File::exists($path)) {
            return [];
        }

        $data = json_decode(File::get($path), true);

        return is_array($data) ? $data : [];
    }

    private function countPhpFiles(string $directory): int
    {
        if (! File::exists($directory)) {
            return 0;
        }

        return count(array_filter(
            File::allFiles($directory),
            fn ($file) => $file->getExtension() === 'php'
        ));
    }

    private function countTestFiles(string $directory): int
    {
        if (! File::exists($directory)) {
            return 0;
        }

        return count(array_filter(
            File::allFiles($directory),
            fn ($file) => str_ends_with($file->getFilename(), 'Test.php')
        ));
    }

    private function countRouteCalls(string $path): int
    {
        if (! File::exists($path)) {
            return 0;
        }

        preg_match_all('/Route::/', File::get($path), $matches);

        return count($matches[0]);
    }

    private function buildReadme(
        string $name,
        string $description,
        int $controllers,
        int $models,
        int $migrations,
        int $tests,
        bool $configExists,
        int $webRoutes,
        int $apiRoutes,
    ): string {
        $configLine = $configExists
            ? 'Fichier : `config/config.php`'
            : 'Aucune configuration.';

        return <<<MD
            # Module {$name}

            {$description}

            ## Structure

            - **Controllers** : {$controllers}
            - **Models** : {$models}
            - **Migrations** : {$migrations}
            - **Tests** : {$tests}

            ## Configuration

            {$configLine}

            ## Routes

            - Web : {$webRoutes} routes
            - API : {$apiRoutes} routes

            ## Tests

            ```bash
            vendor/bin/pest Modules/{$name}/tests
            ```

            MD;
    }
}
