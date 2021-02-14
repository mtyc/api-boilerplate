<?php

declare(strict_types=1);

namespace App\Http;

use Symfony\Component\HttpFoundation\JsonResponse;

class Response
{
    public function successJsonResponse(?array $data = null): JsonResponse
    {
        if (null !== $data) {
            $data = array_merge(['errors' => false], $data);
        } else {
            $data = ['errors' => false];
        }

        return new JsonResponse($data);
    }

    public function badRequestJsonResponse(string $message = 'Bad request'): JsonResponse
    {
        $data = [
            'errors' => [
                'message' => $message,
            ]
        ];

        return new JsonResponse($data, 400);
    }

    public function errorJsonResponse(string $message = 'Bad request'): JsonResponse
    {
        $data = [
            'errors' => [
                'message' => $message,
            ]
        ];

        return new JsonResponse($data, 500);
    }

    public function createdJsonResponse(?array $data = null): JsonResponse
    {
        if (null !== $data) {
            $data = array_merge(['errors' => false], $data);
        } else {
            $data = ['errors' => false];
        }

        return new JsonResponse($data, 201);
    }
}