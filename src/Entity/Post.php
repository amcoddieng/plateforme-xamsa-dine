<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PostRepository::class)]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['post:read'])]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'posts')]
    #[Groups(['post:read'])]
    private ?Compte $auteur = null;

    #[ORM\Column(length: 400)]
    #[Groups(['post:read'])]
    private ?string $contenu = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(['post:read'])]
    private ?\DateTimeInterface $date = null;

    /**
     * @var Collection<int, CommentairePost>
     */
    #[ORM\OneToMany(targetEntity: CommentairePost::class, mappedBy: 'C_post')]
    #[Groups(['post:read'])]
    private Collection $commentairePosts;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    #[Groups(['post:read'])]
    private ?\DateTimeInterface $time = null;

    public function __construct()
    {
        $this->commentairePosts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuteur(): ?compte
    {
        return $this->auteur;
    }

    public function setAuteur(?compte $auteur): static
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): static
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection<int, CommentairePost>
     */
    public function getCommentairePosts(): Collection
    {
        return $this->commentairePosts;
    }

    public function addCommentairePost(CommentairePost $commentairePost): static
    {
        if (!$this->commentairePosts->contains($commentairePost)) {
            $this->commentairePosts->add($commentairePost);
            $commentairePost->setCPost($this);
        }

        return $this;
    }

    public function removeCommentairePost(CommentairePost $commentairePost): static
    {
        if ($this->commentairePosts->removeElement($commentairePost)) {
            // set the owning side to null (unless already changed)
            if ($commentairePost->getCPost() === $this) {
                $commentairePost->setCPost(null);
            }
        }

        return $this;
    }
        // Ajoutez cette méthode pour convertir l'objet en chaîne
        public function __toString(): string
        {
            return $this->nom ?? 'Inconnu';
        }

        public function getTime(): ?\DateTimeInterface
        {
            return $this->time;
        }

        public function setTime(\DateTimeInterface $time): static
        {
            $this->time = $time;

            return $this;
        }
}
