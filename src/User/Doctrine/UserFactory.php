<?php

declare(strict_types=1);

namespace App\User\Doctrine;

use App\User\Model\UserId;
use App\User\Model\UserInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

readonly class UserFactory
{
    public function __construct(private UserPasswordHasherInterface $userPasswordHasher)
    {
    }

    public function create(UserId $id, string $username, string $password): UserInterface
    {
        $user = new User($id);
        $user->setUsername($username);
        $user->setPassword($this->userPasswordHasher->hashPassword($user, $password));
        $user->setRoles([]);

        return $user;
    }
}