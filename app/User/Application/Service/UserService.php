<?php

declare(strict_types=1);

namespace App\User\Application\Service;

use App\User\Application\Exception\UserNotExistException;
use App\User\Domain\Entity\User;
use App\User\Domain\Repository\UserRepositoryInterface;

class UserService
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUser(int $id): User
    {
        $user = $this->userRepository->findById($id);
        if (!$user) {
            throw UserNotExistException::userNotExist();
        }

        return $user;
    }

    public function storeUser(string $name, string $email, string $password, int $roleId): User
    {
        $user = new User(
            null,
            $email,
            $name,
            $roleId,
            null
        );

        $password = bcrypt($password);

        $this->userRepository->create($user, $password);

        return $user;
    }
}
