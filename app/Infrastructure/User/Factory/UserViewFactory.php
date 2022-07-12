<?php

namespace App\Infrastructure\User\Factory;

use App\User\Application\Query\View\UserView;
use App\User\Application\Query\View\UserViewCollection;
use App\Infrastructure\User\Persistence\User as UserModel;
use Illuminate\Support\Collection;

class UserViewFactory
{
    public function createView(UserModel $model): UserView
    {
        return new UserView(
            $model->getId(),
            $model->getEmail(),
            $model->getName(),
            $model->getRoleName()
        );
    }

    public function createCollection(Collection $models): UserViewCollection
    {
        $collection = new UserViewCollection();
        /** @var UserModel $model */
        foreach ($models as $model) {
            $collection->add($this->createView($model));
        }
        return $collection;
    }
}
