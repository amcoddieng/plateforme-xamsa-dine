<?php

namespace App\Entity;

use App\Repository\DouaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DouaRepository::class)]
class Doua
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $contenu_ar = null;

    #[ORM\Column(length: 255)]
    private ?string $contenu_fr = null;

    #[ORM\Column(length: 255)]
    private ?string $signification = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_ajout = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenuAr(): ?string
    {
        return $this->contenu_ar;
    }

    public function setContenuAr(string $contenu_ar): static
    {
        $this->contenu_ar = $contenu_ar;

        return $this;
    }

    public function getContenuFr(): ?string
    {
        return $this->contenu_fr;
    }

    public function setContenuFr(string $contenu_fr): static
    {
        $this->contenu_fr = $contenu_fr;

        return $this;
    }

    public function getSignification(): ?string
    {
        return $this->signification;
    }

    public function setSignification(string $signification): static
    {
        $this->signification = $signification;

        return $this;
    }

    public function getDateAjout(): ?\DateTimeInterface
    {
        return $this->date_ajout;
    }

    public function setDateAjout(\DateTimeInterface $date_ajout): static
    {
        $this->date_ajout = $date_ajout;

        return $this;
    }
}
