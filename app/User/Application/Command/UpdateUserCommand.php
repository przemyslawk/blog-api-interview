<?php

declare(strict_types=1);

namespace App\User\Application\Command;

use App\User\Domain\Entity\User;

/**
 * @see UpdateUserHandler
 */
class UpdateUserCommand
{
    private User $user;
    private ?string $name;
    private ?string $email;
    private ?int $roleId;

    public function __construct(User $user, ?string $name, ?string $email, ?int $roleId)
    {
        $this->user = $user;
        $this->name = $name;
        $this->email = $email;
        $this->roleId = $roleId;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getRoleId(): ?int
    {
        return $this->roleId;
    }
}
