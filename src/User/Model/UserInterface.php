<?php

declare(strict_types=1);

namespace App\User\Model;

use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface as SymfonyUserInterface;

interface UserInterface extends SymfonyUserInterface
{
}