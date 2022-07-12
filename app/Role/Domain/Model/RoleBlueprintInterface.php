<?php

declare(strict_types=1);

namespace App\Role\Domain\Model;

interface RoleBlueprintInterface
{
    public function getId(): int;
    public function getName(): string;
    public function getDescription(): string;
}
