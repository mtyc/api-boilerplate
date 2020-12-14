<?php

declare(strict_types=1);

namespace App\User\Model;

class UserId
{
    private $uuid;

    public function __construct(string $uuid)
    {
        $this->uuid = $uuid;
    }

    public function __toString(): string
    {
        return $this->uuid;
    }
}