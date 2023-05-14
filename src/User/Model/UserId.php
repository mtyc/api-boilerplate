<?php

declare(strict_types=1);

namespace App\User\Model;

use Symfony\Component\Uid\Uuid;

class UserId
{
    private string $uuid;

    public function __construct()
    {
        $this->uuid = Uuid::v7()->toRfc4122();
    }

    public static function fromString(string $userIdAsString): UserId
    {
        $self = new self();
        $self->uuid = $userIdAsString;

        return $self;
    }

    public function __toString(): string
    {
        return $this->uuid;
    }
}