<?php

namespace App\Entity;

use App\Repository\FonctionnaliteCageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FonctionnaliteCageRepository::class)]
class FonctionnaliteCage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $nomFonctionnaliteCage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFonctionnaliteCage(): ?string
    {
        return $this->nomFonctionnaliteCage;
    }

    public function setNomFonctionnaliteCage(?string $nomFonctionnaliteCage): static
    {
        $this->nomFonctionnaliteCage = $nomFonctionnaliteCage;

        return $this;
    }
}
