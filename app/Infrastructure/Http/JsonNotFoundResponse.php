<?php

namespace App\Infrastructure\Http;

use Illuminate\Http\JsonResponse;

class JsonNotFoundResponse extends JsonResponse
{
    public function __construct(string $error)
    {
        parent::__construct(['errors' => [$error]], JsonResponse::HTTP_NOT_FOUND);
    }
}
