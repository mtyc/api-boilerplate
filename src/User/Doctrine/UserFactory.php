<?php

declare(strict_types=1);

namespace App\User\Doctrine;

use App\User\Model\UserId;
use App\User\Model\UserInterface;

class UserFactory
{
    public function create(string $id, string $username, string $password): UserInterface
    {
        $userId = new UserId($id);

        $user = new User($userId);
        $user->setUsername($username);
        $user->setPassword($password);
        $user->setRoles([]);

        return $user;
    }
}