<?php

namespace App\Entity;

use App\Repository\RelationAffiliationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RelationAffiliationRepository::class)]
class RelationAffiliation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $nom = null;

    #[ORM\ManyToOne(targetEntity: self::class)]
    private ?self $animals = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

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
