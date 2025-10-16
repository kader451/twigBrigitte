<?php

namespace App\Entity;

use App\Repository\CarnetSanteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarnetSanteRepository::class)]
class CarnetSante
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $numeroCarnet = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $dateCreationCarnet = null;

    #[ORM\OneToOne(targetEntity: self::class, cascade: ['persist', 'remove'])]
    private ?self $animals = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroCarnet(): ?int
    {
        return $this->numeroCarnet;
    }

    public function setNumeroCarnet(?int $numeroCarnet): static
    {
        $this->numeroCarnet = $numeroCarnet;

        return $this;
    }

    public function getDateCreationCarnet(): ?\DateTime
    {
        return $this->dateCreationCarnet;
    }

    public function setDateCreationCarnet(?\DateTime $dateCreationCarnet): static
    {
        $this->dateCreationCarnet = $dateCreationCarnet;

        return $this;
    }

    public function getAnimals(): ?self
    {
        return $this->animals;
    }

    public function setAnimals(?self $animals): static
    {
        $this->animals = $animals;

        return $this;
    }
}
