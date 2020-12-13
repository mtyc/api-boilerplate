<?php

declare(strict_types=1);

namespace App\User\Command;

use App\CQRS\CommandHandler;
use App\User\Doctrine\UserFactory;
use App\User\Model\PasswordEncoder;
use App\User\Model\UserRepository;

class CreateUserHandler implements CommandHandler
{
    private $userRepository;

    private $passwordEncoder;

    private $userFactory;

    public function __construct(
        UserFactory $userFactory,
        UserRepository $userRepository,
        PasswordEncoder $passwordEncoder
    ) {
        $this->userRepository = $userRepository;
        $this->passwordEncoder = $passwordEncoder;
        $this->userFactory = $userFactory;
    }

    public function __invoke(CreateUserCommand $command): void
    {
        $user = $this->userFactory->create(
            $command->getUserId(),
            $command->getUsername(),
            $this->passwordEncoder->encodePassword($command->getPassword())
        );

        $this->userRepository->save($user);
    }
}