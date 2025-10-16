<?php

namespace App\Entity;

use App\Repository\AlimentationAnimalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlimentationAnimalRepository::class)]
class AlimentationAnimal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?Animals $animals = null;

    #[ORM\ManyToOne]
    private ?Alimentation $alimentation = null;

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

    public function getAlimentation(): ?Alimentation
    {
        return $this->alimentation;
    }

    public function setAlimentation(?Alimentation $alimentation): static
    {
        $this->alimentation = $alimentation;

        return $this;
    }
}
