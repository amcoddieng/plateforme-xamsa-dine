<?php

namespace App\Entity;

use App\Repository\ModerateurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModerateurRepository::class)]
class Moderateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $email = null;

    #[ORM\Column]
    private ?bool $autorisation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?Users
    {
        return $this->email;
    }

    public function setEmail(Users $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function isAutorisation(): ?bool
    {
        return $this->autorisation;
    }

    public function setAutorisation(bool $autorisation): static
    {
        $this->autorisation = $autorisation;

        return $this;
    }
}
