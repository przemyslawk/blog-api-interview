<?php

declare(strict_types=1);

namespace App\User\Application\Handler;

use App\User\Application\Command\DeleteUserCommand;
use App\User\Domain\Repository\UserRepositoryInterface;

class DeleteUserHandler
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(DeleteUserCommand $command): void
    {
        $this->userRepository->delete($command->getUser()->getId());
    }
}
