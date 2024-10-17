<?php

namespace App\Entity;

use App\Repository\QranAudioRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use DateTimeImmutable;

#[ORM\Entity(repositoryClass: QranAudioRepository::class)]
#[Vich\Uploadable]
class QranAudio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $sourate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $audio = null;

    #[ORM\Column]
    private ?int $numero = null;

    #[ORM\ManyToOne(inversedBy: 'qranAudio')]
    private ?Quari $qari = null;

    // This is not a mapped field of the database, just a virtual property
    #[Vich\UploadableField(mapping: 'audio_file', fileNameProperty: 'audio')]
    private ?File $audioFile = null;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

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

    public function getQari(): ?Quari
    {
        return $this->qari;
    }

    public function setQari(?Quari $qari): static
    {
        $this->qari = $qari;

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

    public function setAudioFile(?File $audioFile = null): void
    {
        $this->audioFile = $audioFile;

        if (null !== $audioFile) {
            // It is required that at least one field changes if you are using Doctrine,
            // otherwise the event listeners won't be called and the file is not uploaded.
            $this->updatedAt = new DateTimeImmutable();
        }
    }

    public function getAudioFile(): ?File
    {
        return $this->audioFile;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
