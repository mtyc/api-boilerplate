<?php

declare(strict_types=1);

namespace App\User\Symfony;

use App\User\Doctrine\User;
use App\User\Model\PasswordEncoder;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

class SymfonyPasswordEncoder implements PasswordEncoder
{
    /**
     * @var PasswordEncoderInterface
     */
    private $encoder;

    public function __construct(EncoderFactoryInterface $encoderFactory)
    {
        $this->encoder = $encoderFactory->getEncoder(User::class);
    }

    public function encodePassword(string $password): string
    {
        return $this->encoder->encodePassword($password, null);
    }
}