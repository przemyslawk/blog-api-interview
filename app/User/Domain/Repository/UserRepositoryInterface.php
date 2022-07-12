<?php

declare(strict_types=1);

namespace App\User\Domain\Repository;

use App\User\Domain\Entity\User;

interface UserRepositoryInterface
{
    public function findById(int $id): ?User;
    public function delete(int $id): void;
    public function update(User $user): void;
    public function create(User $user, string $password): void;
}
