<?php

namespace App\Infrastructure\Http;

use Illuminate\Http\JsonResponse;

class JsonForbiddenResponse extends JsonResponse
{
    public function __construct(string $error)
    {
        parent::__construct(['errors' => [$error]], JsonResponse::HTTP_FORBIDDEN);
    }
}
