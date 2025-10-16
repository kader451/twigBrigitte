<?php

namespace App\Entity;

use App\Repository\MaladieAnimalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaladieAnimalRepository::class)]
class MaladieAnimal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?Animals $animals = null;

    #[ORM\ManyToOne]
    private ?Maladie $maladie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnimals(): ?Animals
    {
        return $this->animals;
    }

    public function setAnimals(?Animals $animals): static
    {
        $this->animals = $animals;

        return $this;
    }

    public function getMaladie(): ?Maladie
    {
        return $this->maladie;
    }

    public function setMaladie(?Maladie $maladie): static
    {
        $this->maladie = $maladie;

        return $this;
    }
}
