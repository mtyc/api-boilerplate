<?php

namespace App\User\Model;

interface PasswordEncoder
{
    public function encodePassword(string $password): string;
}