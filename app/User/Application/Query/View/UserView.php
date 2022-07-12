<?php

declare(strict_types=1);

namespace App\User\Application\Query\View;

class UserView
{
    private int $id;
    private string $email;
    private string $name;
    private string $roleName;

    public function __construct(int $id, string $email, string $name, string $roleName)
    {
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
        $this->roleName = $roleName;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRoleName(): string
    {
        return $this->roleName;
    }
}
