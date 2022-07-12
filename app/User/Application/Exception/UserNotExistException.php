<?php

declare(strict_types=1);

namespace App\User\Application\Exception;

class UserNotExistException extends \Exception
{
    public static function userNotExist(): self
    {
        return new self('User not exists');
    }
}
