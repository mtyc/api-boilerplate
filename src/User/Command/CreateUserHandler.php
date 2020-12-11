<?php

declare(strict_types=1);

namespace App\User\Command;

use App\CQRS\CommandHandler;
use App\User\Model\PasswordEncoder;
use App\User\Model\UserRepository;

class CreateUserHandler implements CommandHandler
{
    private $userRepository;

    private $passwordEncoder;

    public function __construct(UserRepository $userRepository, PasswordEncoder $passwordEncoder)
    {
        $this->userRepository = $userRepository;
        $this->passwordEncoder = $passwordEncoder;
    }

    public function __invoke(CreateUserCommand $command): void
    {
        $this->userRepository->create(
            $command->getUserId(),
            $command->getUsername(),
            $this->passwordEncoder->encodePassword($command->getPassword())
        );
    }
}