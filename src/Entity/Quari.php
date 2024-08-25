<?php

namespace App\Entity;

use App\Repository\QuariRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuariRepository::class)]
class Quari
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    /**
     * @var Collection<int, CoranAudio>
     */
    #[ORM\ManyToMany(targetEntity: CoranAudio::class, mappedBy: 'quari')]
    private Collection $coranAudio;

    public function __construct()
    {
        $this->coranAudio = new ArrayCollection();
    }

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, CoranAudio>
     */
    public function getCoranAudio(): Collection
    {
        return $this->coranAudio;
    }

    public function addCoranAudio(CoranAudio $coranAudio): static
    {
        if (!$this->coranAudio->contains($coranAudio)) {
            $this->coranAudio->add($coranAudio);
            $coranAudio->addQuari($this);
        }

        return $this;
    }

    public function removeCoranAudio(CoranAudio $coranAudio): static
    {
        if ($this->coranAudio->removeElement($coranAudio)) {
            $coranAudio->removeQuari($this);
        }

        return $this;
    }
}
