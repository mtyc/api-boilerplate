<?php

declare(strict_types=1);

namespace App\User\Command;

use App\CQRS\Command;

class CreateUserCommand implements Command
{
    private string $userId;

    private string $username;

    private string $password;

    public function __construct(string $userId, string $username, string $password)
    {
        $this->userId = $userId;
        $this->username = $username;
        $this->password = $password;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}