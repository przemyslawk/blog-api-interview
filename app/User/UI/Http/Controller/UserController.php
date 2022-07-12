<?php

declare(strict_types=1);

namespace App\User\UI\Http\Controller;

use App\Infrastructure\Http\JsonNoContentResponse;
use App\Infrastructure\Http\JsonNotFoundResponse;
use App\User\Application\Command\DeleteUserCommand;
use App\User\Application\Command\UpdateUserCommand;
use App\User\Application\Exception\UserNotExistException;
use App\User\Application\Query\UserQueryInterface;
use App\User\Application\Service\UserService;
use App\User\UI\Http\Request\UpdateUserRequest;
use App\User\UI\Http\Request\UserListRequest;
use App\User\UI\Http\Request\UserRequest;
use App\User\UI\Http\Resource\UserResource;
use Illuminate\Bus\Dispatcher;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private UserService $userService;
    private UserQueryInterface $userQuery;
    private Dispatcher $dispatcher;

    public function __construct(UserService $userService, UserQueryInterface $userQuery, Dispatcher $dispatcher)
    {
        $this->userService = $userService;
        $this->userQuery = $userQuery;
        $this->dispatcher = $dispatcher;
    }

    public function list(UserListRequest $request): JsonResponse
    {
        return response()->json(
            UserResource::collection(
                $this->userQuery->getUsersPaginated($request->getPage(), $request->getLimit())
            )
        );
    }

    public function store(UserRequest $request): JsonResponse
    {
        $user = $this->userService->storeUser(
            $request->getName(),
            $request->getEmail(),
            $request->getPassword(),
            $request->getRoleId()
        );

        return response()->json(new UserResource($this->userQuery->getUser($user->getId())));
    }

    public function update(int $id, UpdateUserRequest $updateUserRequest): JsonResponse
    {
        try {
            $user = $this->userService->getUser($id);
            $command = new UpdateUserCommand(
                $user,
                $updateUserRequest->getName(),
                $updateUserRequest->getEmail(),
                $updateUserRequest->getRoleId()
            );
            $this->dispatcher->dispatchNow($command);

            return response()->json(
                new UserResource($this->userQuery->getUser($id))
            );
        } catch (UserNotExistException $e) {
            return new JsonNotFoundResponse('User not exists.');
        }
    }

    public function delete(int $id): JsonResponse
    {
        try {
            $user = $this->userService->getUser($id);

            $this->dispatcher->dispatchNow(new DeleteUserCommand($user));
            return new JsonNoContentResponse();
        } catch (UserNotExistException $e) {
            return new JsonNotFoundResponse('User not exists.');
        }
    }
}
