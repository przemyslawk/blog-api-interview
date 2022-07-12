<?php

declare(strict_types=1);

namespace App\User\Application\Exception;

class UserHasDetailsException extends \Exception
{
    public static function userHasDetails(): self
    {
        return new self('User has details');
    }
}
