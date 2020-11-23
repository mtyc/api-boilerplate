<?php

declare(strict_types=1);

namespace App\User\Model;

use Ramsey\Uuid\UuidInterface;

class UserId
{
    private $uuid;

    public function __construct(UuidInterface $uuid)
    {
        $this->uuid = $uuid;
    }

    public function toString(): string
    {
        return $this->uuid->toString();
    }
}