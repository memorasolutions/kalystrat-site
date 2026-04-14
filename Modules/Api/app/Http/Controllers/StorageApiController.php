<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Api\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Modules\Storage\Services\StorageService;

/**
 * @group Storage
 *
 * Admin storage management endpoints.
 */
class StorageApiController extends BaseApiController
{
    /**
     * List all configured disks with usage statistics.
     */
    public function disks(StorageService $storageService): JsonResponse
    {
        $data = [];

        foreach (array_keys(config('filesystems.disks', [])) as $diskName) {
            try {
                $usage = $storageService->diskUsage($diskName);
                $data[] = [
                    'name' => $diskName,
                    'files_count' => $usage['files_count'],
                    'total_size' => $usage['total_size'],
                    'total_size_human' => $usage['total_size_human'],
                ];
            } catch (\Throwable) {
                $data[] = [
                    'name' => $diskName,
                    'files_count' => 0,
                    'total_size' => 0,
                    'total_size_human' => '0 o',
                    'error' => true,
                ];
            }
        }

        return $this->respondSuccess($data);
    }

    /**
     * List files and directories for a specific disk.
     */
    public function files(string $disk, StorageService $storageService): JsonResponse
    {
        if (! array_key_exists($disk, config('filesystems.disks', []))) {
            return $this->respondNotFound(__('Disque introuvable.'));
        }

        return $this->respondSuccess([
            'disk' => $disk,
            'files' => $storageService->files('', $disk),
            'directories' => $storageService->directories('', $disk),
        ]);
    }
}
