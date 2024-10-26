<?php

namespace App\Entity;

use App\Repository\CompteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CompteRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
class Compte implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    #[Groups(['compte:read'])]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    // #[Groups(['compte:read'])]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    #[Groups(['compte:read'])]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    #[Groups(['compte:read'])]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    #[Groups(['compte:read'])]
    private ?string $nom = null;

    /**
     * @var Collection<int, Post>
     */
    #[ORM\OneToMany(targetEntity: Post::class, mappedBy: 'auteur')]
    // #[Groups(['compte:read'])]
    private Collection $posts;

    /**
     * @var Collection<int, CommentairePost>
     */
    #[ORM\OneToMany(targetEntity: CommentairePost::class, mappedBy: 'auteur_c')]
    // #[Groups(['compte:read'])]
    private Collection $commentairePosts;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $this->commentairePosts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    /**
     * @return Collection<int, Post>
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    public function addPost(Post $post): static
    {
        if (!$this->posts->contains($post)) {
            $this->posts->add($post);
            $post->setAuteur($this);
        }

        return $this;
    }

    public function removePost(Post $post): static
    {
        if ($this->posts->removeElement($post)) {
            // set the owning side to null (unless already changed)
            if ($post->getAuteur() === $this) {
                $post->setAuteur(null);
            }
        }

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
            $commentairePost->setAuteurC($this);
        }

        return $this;
    }

    public function removeCommentairePost(CommentairePost $commentairePost): static
    {
        if ($this->commentairePosts->removeElement($commentairePost)) {
            // set the owning side to null (unless already changed)
            if ($commentairePost->getAuteurC() === $this) {
                $commentairePost->setAuteurC(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->nom; // Retourne le nom du compte
    }
}
