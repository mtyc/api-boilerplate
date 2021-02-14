<?php

declare(strict_types=1);

namespace App\User\Doctrine;

use App\User\Model\UserId;
use App\User\Model\UserInterface;

class UserFactory
{
    public function create(UserId $id, string $username, string $password): UserInterface
    {
        $user = new User($id);
        $user->setUsername($username);
        $user->setPassword($password);
        $user->setRoles([]);

        return $user;
    }
}