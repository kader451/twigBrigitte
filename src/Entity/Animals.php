<?php

namespace App\Entity;

use App\Repository\AnimalsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalsRepository::class)]
class Animals
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private string $sexe = "inconnu";

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $dataNaissance = null;

    #[ORM\Column(nullable: true)]
    private ?int $age = null;

    #[ORM\Column(nullable: true)]
    private ?int $numeroIdentification = null;

    #[ORM\Column(nullable: true)]
    private ?bool $adoptable = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $dateArrive = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    private ?Adoptant $adoptant = null;

    #[ORM\ManyToOne(inversedBy: 'animal')]
    private ?Race $race = null;

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

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): static
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getDataNaissance(): ?\DateTime
    {
        return $this->dataNaissance;
    }

    public function setDataNaissance(?\DateTime $dataNaissance): static
    {
        $this->dataNaissance = $dataNaissance;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getNumeroIdentification(): ?int
    {
        return $this->numeroIdentification;
    }

    public function setNumeroIdentification(?int $numeroIdentification): static
    {
        $this->numeroIdentification = $numeroIdentification;

        return $this;
    }

    public function isAdoptable(): ?bool
    {
        return $this->adoptable;
    }

    public function setAdoptable(?bool $adoptable): static
    {
        $this->adoptable = $adoptable;

        return $this;
    }

    public function getDateArrive(): ?\DateTime
    {
        return $this->dateArrive;
    }

    public function setDateArrive(?\DateTime $dateArrive): static
    {
        $this->dateArrive = $dateArrive;

        return $this;
    }

    public function getAdoptant(): ?Adoptant
    {
        return $this->adoptant;
    }

    public function setAdoptant(?Adoptant $adoptant): static
    {
        $this->adoptant = $adoptant;

        return $this;
    }

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(?Race $race): static
    {
        $this->race = $race;

        return $this;
    }
}
