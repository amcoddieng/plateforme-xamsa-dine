<?php

namespace App\Entity;

use App\Repository\CoranRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoranRepository::class)]
class Coran
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $souarte = null;

    #[ORM\Column]
    private ?int $numero = null;

    #[ORM\Column]
    private ?int $numero_page = null;

    #[ORM\Column(length: 255)]
    private ?string $langue = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSouarte(): ?string
    {
        return $this->souarte;
    }

    public function setSouarte(string $souarte): static
    {
        $this->souarte = $souarte;

        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): static
    {
        $this->numero = $numero;

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

    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(string $langue): static
    {
        $this->langue = $langue;

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
