<?php

declare(strict_types=1);

namespace App\User\Doctrine;

use App\User\Model\UserId;
use App\User\Model\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User implements UserInterface
{
    public function __construct(UserId $userId)
    {
        $this->id = $userId;
    }

    /**
     * @var UserId
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     * @Groups({"users_no_sensitive"})
     */
    private $id;

    /**
     * @var string[]
     * @ORM\Column(type="json")
     */
    private $roles;

    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=false)
     */
    private $password;

    /**
     * @var string|null
     */
    private $salt;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false, unique=true)
     * @Groups({"users_no_sensitive"})
     */
    private $username;

    /**
     * @return UserId
     */
    public function getId(): UserId
    {
        return new UserId($this->id);
    }

    public function getRoles(): array
    {
        return [];
    }

    /**
     * @param string[] $roles
     */
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    public function getSalt(): ?string
    {
        return $this->salt;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function eraseCredentials(): void
    {
    }
}