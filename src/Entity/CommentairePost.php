<?php

namespace App\Entity;

use App\Repository\CommentairePostRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentairePostRepository::class)]
class CommentairePost
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'commentairePosts')]
    private ?post $C_post = null;

    #[ORM\Column(length: 300)]
    private ?string $contenu_c = null;

    #[ORM\ManyToOne(inversedBy: 'commentairePosts')]
    private ?compte $auteur_c = null;

    #[ORM\Column]
    private ?int $follow = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCPost(): ?post
    {
        return $this->C_post;
    }

    public function setCPost(?post $C_post): static
    {
        $this->C_post = $C_post;

        return $this;
    }

    public function getContenuC(): ?string
    {
        return $this->contenu_c;
    }

    public function setContenuC(string $contenu_c): static
    {
        $this->contenu_c = $contenu_c;

        return $this;
    }

    public function getAuteurC(): ?compte
    {
        return $this->auteur_c;
    }

    public function setAuteurC(?compte $auteur_c): static
    {
        $this->auteur_c = $auteur_c;

        return $this;
    }

    public function getFollow(): ?int
    {
        return $this->follow;
    }

    public function setFollow(int $follow): static
    {
        $this->follow = $follow;

        return $this;
    }
}
