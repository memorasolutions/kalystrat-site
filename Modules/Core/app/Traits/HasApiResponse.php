<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Core\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

trait HasApiResponse
{
    protected function respondSuccess(mixed $data = null, string $message = 'OK', int $code = 200): JsonResponse
    {
        if ($data instanceof JsonResource) {
            $response = $data->response()->getData(true);

            return response()->json(array_merge([
                'success' => true,
                'message' => $message,
            ], $response), $code);
        }

        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    protected function respondError(string $message = 'Erreur', int $code = 400, mixed $errors = null): JsonResponse
    {
        $titles = [
            400 => 'Bad Request', 401 => 'Unauthorized', 403 => 'Forbidden',
            404 => 'Not Found', 422 => 'Unprocessable Entity', 429 => 'Too Many Requests',
            500 => 'Internal Server Error',
        ];

        $response = [
            'success' => false,
            'message' => $message,
            'type' => "https://httpstatuses.io/{$code}",
            'title' => $titles[$code] ?? 'Error',
            'status' => $code,
            'detail' => $message,
        ];

        if ($errors !== null) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $code)
            ->header('Content-Type', 'application/problem+json');
    }

    protected function respondCreated(mixed $data = null, string $message = 'Créé avec succès'): JsonResponse
    {
        return $this->respondSuccess($data, $message, 201);
    }

    protected function respondNotFound(string $message = 'Ressource introuvable'): JsonResponse
    {
        return $this->respondError($message, 404);
    }

    protected function respondUnauthorized(string $message = 'Non authentifié'): JsonResponse
    {
        return $this->respondError($message, 401);
    }

    protected function respondForbidden(string $message = 'Accès interdit'): JsonResponse
    {
        return $this->respondError($message, 403);
    }

    protected function respondNoContent(): JsonResponse
    {
        return response()->json(null, 204);
    }
}
