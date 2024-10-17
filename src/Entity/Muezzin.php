<?php

namespace App\Entity;

use App\Repository\MuezzinRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: MuezzinRepository::class)]
#[Vich\Uploadable]
class Muezzin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $mosque = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $audio = null;

    #[ORM\ManyToOne(inversedBy: 'muezzin')]
    private ?Users $users = null;

    // This is not a mapped field of the database, just a virtual property
    #[Vich\UploadableField(mapping: 'audio_file_adan', fileNameProperty: 'audio')]
    private ?File $audioFile = null;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

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

    public function getMosque(): ?string
    {
        return $this->mosque;
    }

    public function setMosque(string $mosque): static
    {
        $this->mosque = $mosque;

        return $this;
    }

    public function getAudio(): ?string
    {
        return $this->audio;
    }

    public function setAudio(?string $audio): static
    {
        $this->audio = $audio;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): static
    {
        $this->users = $users;

        return $this;
    }

    // Getter and setter for audioFile
    public function setAudioFile(?File $audioFile = null): void
    {
        $this->audioFile = $audioFile;

        // If the file is uploaded, update the updatedAt field to trigger Doctrine updates
        if ($audioFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getAudioFile(): ?File
    {
        return $this->audioFile;
    }

    // Getter and setter for updatedAt
    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
