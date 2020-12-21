<?php

declare(strict_types=1);

namespace App\User\Model;

class UserId
{
    private string $uuid;

    public function __construct(string $uuid)
    {
        $this->uuid = $uuid;
    }

    public function __toString(): string
    {
        return $this->uuid;
    }
}