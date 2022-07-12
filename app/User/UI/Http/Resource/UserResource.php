<?php

declare(strict_types=1);

namespace App\User\UI\Http\Resource;

use App\User\Application\Query\View\UserView;
use Illuminate\Http\Resources\Json\JsonResource as Resource;

class UserResource extends Resource
{
    /** @var UserView */
    public $resource;

    public function __construct($resource)
    {
        parent::__construct($resource);
    }

    public function toArray($request)
    {
        return [
            'id' => $this->resource->getId(),
            'name' => $this->resource->getName(),
            'email' => $this->resource->getEmail(),
            'roleName' => $this->resource->getRoleName(),
        ];
    }
}
