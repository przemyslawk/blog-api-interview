<?php

declare(strict_types=1);

namespace App\Infrastructure\User\Provider;

use App\Infrastructure\User\Query\UserQuery;
use App\Infrastructure\User\Repository\UserRepository;
use App\User\Application\Command\DeleteUserCommand;
use App\User\Application\Command\UpdateUserCommand;
use App\User\Application\Handler\DeleteUserHandler;
use App\User\Application\Handler\UpdateUserHandler;
use App\User\Application\Query\UserQueryInterface;
use App\User\Domain\Repository\UserRepositoryInterface;
use Illuminate\Bus\Dispatcher;
use Illuminate\Support\ServiceProvider;

class UserProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->extend(Dispatcher::class, static function (Dispatcher $service) {
            $service->map([
                DeleteUserCommand::class => DeleteUserHandler::class,
                UpdateUserCommand::class => UpdateUserHandler::class,
            ]);

            return $service;
        });
    }
    public function register(): void
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            UserQueryInterface::class,
            UserQuery::class
        );
    }
}
