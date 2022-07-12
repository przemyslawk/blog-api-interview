<?php

declare(strict_types=1);

namespace App\User\Application\Query;

use App\User\Application\Query\View\UserView;
use App\User\Application\Query\View\UserViewCollection;

interface UserQueryInterface
{
    public function getUser(int $userId): ?UserView;
    public function getUsersPaginated(int $page, int $limit): UserViewCollection;
}
