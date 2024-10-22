<?php

namespace App\Entity;

use App\Repository\CitationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CitationRepository::class)]
class Citation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 300)]
    private ?string $contenu_original = null;

    #[ORM\Column(length: 300)]
    private ?string $contenu_traduit = null;

    #[ORM\Column(length: 255)]
    private ?string $auteur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenuOriginal(): ?string
    {
        return $this->contenu_original;
    }

    public function setContenuOriginal(string $contenu_original): static
    {
        $this->contenu_original = $contenu_original;

        return $this;
    }

    public function getContenuTraduit(): ?string
    {
        return $this->contenu_traduit;
    }

    public function setContenuTraduit(string $contenu_traduit): static
    {
        $this->contenu_traduit = $contenu_traduit;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): static
    {
        $this->auteur = $auteur;

        return $this;
    }
}
