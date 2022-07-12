<?php

declare(strict_types=1);

namespace App\User\Application\Handler;

use App\User\Application\Command\UpdateUserCommand;
use App\User\Domain\Repository\UserRepositoryInterface;


class UpdateUserHandler
{
    private UserRepositoryInterface $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function handle(UpdateUserCommand $command): void
    {
        $user = $command->getUser();

        if ($command->getRoleId()) {
            $user->setRoleId($command->getRoleId());
        }

        if ($command->getEmail()) {
            $user->setEmail($command->getEmail());
        }

        if ($command->getName()) {
            $user->setName($command->getName());
        }

        $this->userRepository->update($user);
    }
}
