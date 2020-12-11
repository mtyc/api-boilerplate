<?php

declare(strict_types=1);

namespace App\User\Model;

interface UserRepository
{
    public function create(UserId $userId, string $username, string $password): void;
}