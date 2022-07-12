<?php

declare(strict_types=1);

namespace App\Infrastructure\User\Factory;

use App\User\Domain\Entity\User;
use App\Infrastructure\User\Persistence\User as UserModel;

class UserFactory
{
    public function create(UserModel $userModel): User
    {
        return new User(
            $userModel->getId(),
            $userModel->getEmail(),
            $userModel->getName(),
            $userModel->getRoleId(),
            $userModel->getRoleName(),
        );
    }
}
