<?php

declare(strict_types=1);

namespace App\User\Symfony;

use App\User\Model\PasswordEncoder;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SymfonyPasswordEncoder implements PasswordEncoder
{
    public function __construct(private readonly UserPasswordHasherInterface $userPasswordHasher)
    {
    }

    public function encodePassword(string $password): string
    {
        return $this->userPasswordHasher->hashPassword($user, $password);
    }
}