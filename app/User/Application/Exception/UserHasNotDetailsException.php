<?php

declare(strict_types=1);

namespace App\User\Application\Exception;

class UserHasNotDetailsException extends \Exception
{
    public static function userHasNotDetails(): self
    {
        return new self('User has not details');
    }
}
