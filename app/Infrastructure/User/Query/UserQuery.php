<?php

declare(strict_types=1);

namespace App\Infrastructure\User\Query;

use App\Infrastructure\User\Factory\UserViewFactory;
use App\Infrastructure\User\Persistence\User as UserModel;
use App\User\Application\Query\UserQueryInterface;
use App\User\Application\Query\View\UserView;
use App\User\Application\Query\View\UserViewCollection;

class UserQuery implements UserQueryInterface
{
    /** @var UserViewFactory  */
    private $userViewFactory;

    public function __construct(UserViewFactory $userViewFactory)
    {
        $this->userViewFactory = $userViewFactory;
    }

    public function getUser(int $userId): ?UserView
    {
        $user = UserModel::query()->find($userId);

        return $user ? $this->userViewFactory->createView($user) : null;
    }

    public function getUsersPaginated(int $page, int $limit): UserViewCollection
    {
        $users = UserModel::query()
            ->forPage($page, $limit)
            ->get();

        return $this->userViewFactory->createCollection($users);
    }
}
