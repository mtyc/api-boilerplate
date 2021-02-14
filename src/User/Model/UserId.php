<?php

declare(strict_types=1);

namespace App\User\Model;

use InvalidArgumentException;

class UserId
{
    private string $uuid;

    public function __construct(string $uuid)
    {
        if (empty($uuid)) {
            throw new InvalidArgumentException('User id can not be empty');
        }

        $this->uuid = $uuid;
    }

    public function __toString(): string
    {
        return $this->uuid;
    }
}