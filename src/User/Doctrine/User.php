<?php

declare(strict_types=1);

namespace App\User\Doctrine;

use App\User\Model\UserId;
use App\User\Model\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User implements UserInterface
{
    /**
     * @ORM\Column(type="json")
     */
    private array $roles;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private ?string $password;

    /**
     * @ORM\Column(type="string", nullable=false, unique=true)
     * @Groups({"users_no_sensitive"})
     */
    private string $username;

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=36, unique=true)
     * @ORM\GeneratedValue(strategy="NONE")
     * @Groups({"users_no_sensitive"})
     */
    public function __construct(private readonly UserId $id)
    {
    }

    public function getId(): UserId
    {
        return $this->id;
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

    public function getUserIdentifier(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function eraseCredentials(): void
    {
    }
}