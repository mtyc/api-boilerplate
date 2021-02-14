<?php

declare(strict_types=1);

namespace App\Http;

use JsonException;
use Symfony\Component\HttpFoundation\Request;

class Payload
{
    public function fromRequest(Request $request): array
    {
        try {
            return json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $exception) {
            return [];
        }
    }
}