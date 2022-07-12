<?php

declare(strict_types=1);

namespace App\User\Domain\Entity;

class User
{
    private ?int $id;
    private string $email;
    private string $name;
    private int $roleId;
    private ?string $roleName;

    public function __construct(?int $id, string $email, string $name, int $roleId, ?string $roleName)
    {
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
        $this->roleId = $roleId;
        $this->roleName = $roleName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getRoleName(): string
    {
        return $this->roleName;
    }

    public function setRoleName(string $roleName): void
    {
        $this->roleName = $roleName;
    }

    public function setRoleId(int $roleId): void
    {
        $this->roleId = $roleId;
    }

    public function getRoleId(): int
    {
        return $this->roleId;
    }
}
