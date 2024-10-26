<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
class Livre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['livre:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['livre:read'])]
    private ?string $titre = null;

    #[ORM\Column(length: 500)]
    #[Groups(['livre:read'])]
    private ?string $description = null;

    #[ORM\Column]
    #[Groups(['livre:read'])]
    private ?int $numero_page = null;

    #[Groups(['livre:read'])]
    #[ORM\ManyToOne(inversedBy: 'livres')]
    private ?Auteur $auteur = null;

    #[ORM\Column(length: 255)]
    #[Groups(['livre:read'])]
    private ?string $image = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getNumeroPage(): ?int
    {
        return $this->numero_page;
    }

    public function setNumeroPage(int $numero_page): static
    {
        $this->numero_page = $numero_page;

        return $this;
    }

    public function getAuteur(): ?Auteur
    {
        return $this->auteur;
    }

    public function setAuteur(?Auteur $auteur): static
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }
}
