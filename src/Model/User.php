<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    #[NotBlank]
    protected string $name;

    #[NotBlank]
    #[Email]
    protected string $email;

    protected string $phone;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): User
    {
        $this->name = $name;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): User
    {
        $this->phone = $phone;
        return $this;
    }

    public function getRoles(): array
    {
        return ['ROLE_USER', 'ROLE_ADMIN'];
    }

    public function eraseCredentials(): void
    {
    }

    public function getUserIdentifier(): string
    {
        return $this->email;
    }
}
