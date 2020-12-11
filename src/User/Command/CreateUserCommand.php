<?php

declare(strict_types=1);

namespace App\User\Command;

use App\CQRS\Command;
use App\User\Model\UserId;

class CreateUserCommand implements Command
{
    private $userId;

    private $username;

    private $password;

    public function __construct(UserId $userId, string $username, string $password)
    {
        $this->userId = $userId;
        $this->username = $username;
        $this->password = $password;
    }

    public function getUserId(): UserId
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