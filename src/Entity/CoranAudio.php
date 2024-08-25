<?php

namespace App\Entity;

use App\Repository\CoranAudioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoranAudioRepository::class)]
class CoranAudio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $sourate = null;

    #[ORM\Column]
    private ?int $numero = null;

    /**
     * @var Collection<int, quari>
     */
    #[ORM\ManyToMany(targetEntity: Quari::class, inversedBy: 'coranAudio')]
    private Collection $quari;

    public function __construct()
    {
        $this->quari = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSourate(): ?string
    {
        return $this->sourate;
    }

    public function setSourate(string $sourate): static
    {
        $this->sourate = $sourate;

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

    /**
     * @return Collection<int, quari>
     */
    public function getQuari(): Collection
    {
        return $this->quari;
    }

    public function addQuari(quari $quari): static
    {
        if (!$this->quari->contains($quari)) {
            $this->quari->add($quari);
        }

        return $this;
    }

    public function removeQuari(quari $quari): static
    {
        $this->quari->removeElement($quari);

        return $this;
    }
}
