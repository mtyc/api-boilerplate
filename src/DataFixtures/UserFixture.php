<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\CQRS\MessengerCommandBus;
use App\User\Command\CreateUserCommand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;

class UserFixture extends Fixture
{
    private $commandBus;

    public function __construct(MessengerCommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function load(ObjectManager $manager): void
    {
        $userCreateCommand = new CreateUserCommand(Uuid::uuid4()->toString(), 'jdoe@niepodam.pl', 'secretPasswd');

        $this->commandBus->dispatch($userCreateCommand);
    }
}
