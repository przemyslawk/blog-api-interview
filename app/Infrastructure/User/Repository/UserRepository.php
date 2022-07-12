<?php

declare(strict_types=1);

namespace App\Infrastructure\User\Repository;

use App\Infrastructure\User\Factory\UserFactory;
use App\User\Domain\Entity\User;
use App\User\Domain\Repository\UserRepositoryInterface;
use App\Infrastructure\User\Persistence\User as UserModel;

class UserRepository implements UserRepositoryInterface
{
    private UserFactory $userFactory;

    public function __construct(UserFactory $userFactory)
    {
        $this->userFactory = $userFactory;
    }

    public function findById(int $id): ?User
    {
        $model = UserModel::query()->find($id);

        return $model ? $this->userFactory->create($model) : null;
    }

    public function delete(int $id): void
    {
        UserModel::query()->findOrFail($id)->delete();
    }

    public function update(User $user): void
    {
        $userModel = UserModel::find($user->getId());

        $userModel->email = $user->getEmail();
        $userModel->role_id = $user->getRoleId();
        $userModel->name = $user->getName();
        $userModel->save();
    }

    public function create(User $user, string $password): void
    {
        $userModel = new UserModel();
        $userModel->email = $user->getEmail();
        $userModel->name = $user->getName();
        $userModel->password = $password;
        $userModel->role_id = $user->getRoleId();

        $userModel->save();
        $user->setId($userModel->getId());
        $user->setRoleName($userModel->getRoleName());
    }
}
