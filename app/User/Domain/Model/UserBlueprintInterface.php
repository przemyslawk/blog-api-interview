<?php

declare(strict_types=1);

namespace App\User\Domain\Model;

interface UserBlueprintInterface
{
    public function getId(): int;
    public function getEmail(): string;
    public function getName(): string;
}
