<?php

declare(strict_types=1);

namespace App\User\Command;

use App\CQRS\Command;
use App\User\Model\UserId;
use InvalidArgumentException;

class CreateUserCommand implements Command
{
    private UserId $userId;

    private string $username;

    private string $password;

    public function __construct(UserId $userId, string $username, string $password)
    {
        $this->userId = $userId;

        if (empty($username) || empty($password)) {
            throw new InvalidArgumentException('Username and password can not be empty');
        }
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