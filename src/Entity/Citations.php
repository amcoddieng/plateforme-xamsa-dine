<?php

namespace App\Entity;

use App\Repository\CitationsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CitationsRepository::class)]
class Citations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $auteur = null;

    #[ORM\Column(length: 300)]
    private ?string $contenu1 = null;

    #[ORM\Column(length: 350)]
    private ?string $contenuTraduit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(?string $auteur): static
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getContenu1(): ?string
    {
        return $this->contenu1;
    }

    public function setContenu1(string $contenu1): static
    {
        $this->contenu1 = $contenu1;

        return $this;
    }

    public function getContenuTraduit(): ?string
    {
        return $this->contenuTraduit;
    }

    public function setContenuTraduit(string $contenuTraduit): static
    {
        $this->contenuTraduit = $contenuTraduit;

        return $this;
    }
}
