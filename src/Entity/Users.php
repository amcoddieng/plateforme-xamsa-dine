<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $region = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_naissance = null;

    #[ORM\Column(length: 255)]
    private ?string $lieu_naissance = null;

    /**
     * @var Collection<int, Muezzin>
     */
    #[ORM\OneToMany(targetEntity: Muezzin::class, mappedBy: 'users')]
    private Collection $muezzin;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column]
    private ?bool $autorisation = null;

    public function __construct()
    {
        $this->muezzin = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): static
    {
        $this->region = $region;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): static
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieu_naissance;
    }

    public function setLieuNaissance(string $lieu_naissance): static
    {
        $this->lieu_naissance = $lieu_naissance;

        return $this;
    }

    /**
     * @return Collection<int, Muezzin>
     */
    public function getMuezzin(): Collection
    {
        return $this->muezzin;
    }

    public function addMuezzin(Muezzin $muezzin): static
    {
        if (!$this->muezzin->contains($muezzin)) {
            $this->muezzin->add($muezzin);
            $muezzin->setUsers($this);
        }

        return $this;
    }

    public function removeMuezzin(Muezzin $muezzin): static
    {
        if ($this->muezzin->removeElement($muezzin)) {
            // set the owning side to null (unless already changed)
            if ($muezzin->getUsers() === $this) {
                $muezzin->setUsers(null);
            }
        }

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

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
