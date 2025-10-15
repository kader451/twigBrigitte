<?php

namespace App\Entity;

use App\Repository\AlimentationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlimentationRepository::class)]
class Alimentation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $quantite = null;

    #[ORM\Column(length: 55, nullable: true)]
    private ?string $typeAliment = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(?int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getTypeAliment(): ?string
    {
        return $this->typeAliment;
    }

    public function setTypeAliment(?string $typeAliment): static
    {
        $this->typeAliment = $typeAliment;

        return $this;
    }
}
