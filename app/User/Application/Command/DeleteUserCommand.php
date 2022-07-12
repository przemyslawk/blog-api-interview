<?php

declare(strict_types=1);

namespace App\User\Application\Command;

use App\User\Domain\Entity\User;

/**
 * @see DeleteUserHandler
 */
class DeleteUserCommand
{
    /** @var User */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
