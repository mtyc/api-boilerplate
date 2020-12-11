<?php

declare(strict_types=1);

namespace App\User\Doctrine;

use App\User\Model\UserId;
use App\User\Model\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineUserRepository implements UserRepository
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function create(UserId $userId, string $username, string $password): void
    {
        $user = new User($userId);
        $user->setUsername($username);
        $user->setPassword($password);
        $user->setRoles([]);

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}