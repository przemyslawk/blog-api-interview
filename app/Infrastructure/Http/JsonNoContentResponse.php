<?php

declare(strict_types=1);

namespace App\Infrastructure\Http;

use Illuminate\Http\JsonResponse;

class JsonNoContentResponse extends JsonResponse
{
    public function __construct()
    {
        parent::__construct([], JsonResponse::HTTP_NO_CONTENT);
    }
}
