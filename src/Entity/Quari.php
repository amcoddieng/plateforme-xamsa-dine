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
     * @var Collection<int, QranAudio>
     */
    #[ORM\OneToMany(targetEntity: QranAudio::class, mappedBy: 'qari')]
    private Collection $qranAudio;

    public function __construct()
    {
        $this->qranAudio = new ArrayCollection();
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
     * @return Collection<int, QranAudio>
     */
    public function getQranAudio(): Collection
    {
        return $this->qranAudio;
    }

    public function addQranAudio(QranAudio $qranAudio): static
    {
        if (!$this->qranAudio->contains($qranAudio)) {
            $this->qranAudio->add($qranAudio);
            $qranAudio->setQari($this);
        }

        return $this;
    }

    public function removeQranAudio(QranAudio $qranAudio): static
    {
        if ($this->qranAudio->removeElement($qranAudio)) {
            // set the owning side to null (unless already changed)
            if ($qranAudio->getQari() === $this) {
                $qranAudio->setQari(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->nom; // Retourne le nom du Qari
    }



}
