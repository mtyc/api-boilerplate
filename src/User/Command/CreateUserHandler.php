<?php

declare(strict_types=1);

namespace App\User\Command;

use App\CQRS\CommandHandler;
use App\User\Doctrine\UserFactory;
use App\User\Model\UserRepository;

class CreateUserHandler implements CommandHandler
{
    private UserRepository $userRepository;

    private UserFactory $userFactory;

    public function __construct(
        UserFactory $userFactory,
        UserRepository $userRepository,
    ) {
        $this->userRepository = $userRepository;
        $this->userFactory = $userFactory;
    }

    public function __invoke(CreateUserCommand $command): void
    {
        $user = $this->userFactory->create(
            $command->getUserId(),
            $command->getUsername(),
            $command->getPassword()
        );

        $this->userRepository->save($user);
    }
}