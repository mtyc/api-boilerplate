<?php

declare(strict_types=1);

namespace App\User\Model;

interface UserRepository
{
    public function save(UserInterface $user): void;
}