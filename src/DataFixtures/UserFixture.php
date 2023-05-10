<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\CQRS\MessengerCommandBus;
use App\User\Command\CreateUserCommand;
use App\User\Model\UserId;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixture extends Fixture
{

    public function __construct(private readonly MessengerCommandBus $commandBus)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $userCreateCommand = new CreateUserCommand(
            new UserId(),
            'jdoe@niepodam.pl',
            'secretPasswd'
        );

        $this->commandBus->dispatch($userCreateCommand);
    }
}
