<?php

namespace App\Entity;

use App\Repository\MuezzinRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MuezzinRepository::class)]
class Muezzin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $mosque = null;

    #[ORM\Column(length: 255)]
    private ?string $audio = null;

    #[ORM\ManyToOne(inversedBy: 'muezzin')]
    private ?Users $users = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getMosque(): ?string
    {
        return $this->mosque;
    }

    public function setMosque(string $mosque): static
    {
        $this->mosque = $mosque;

        return $this;
    }

    public function getAudio(): ?string
    {
        return $this->audio;
    }

    public function setAudio(string $audio): static
    {
        $this->audio = $audio;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): static
    {
        $this->users = $users;

        return $this;
    }
}
