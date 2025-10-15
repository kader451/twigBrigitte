<?php

namespace App\Entity;

use App\Repository\AlimentationAnimalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlimentationAnimalRepository::class)]
class AlimentationAnimal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\ManyToMany(targetEntity: self::class)]
    private Collection $animals;

    /**
     * @var Collection<int, self>
     */
    #[ORM\ManyToMany(targetEntity: self::class)]
    private Collection $alimentation;

    public function __construct()
    {
        $this->animals = new ArrayCollection();
        $this->alimentation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, self>
     */
    public function getAnimals(): Collection
    {
        return $this->animals;
    }

    public function addAnimal(self $animal): static
    {
        if (!$this->animals->contains($animal)) {
            $this->animals->add($animal);
        }

        return $this;
    }

    public function removeAnimal(self $animal): static
    {
        $this->animals->removeElement($animal);

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getAlimentation(): Collection
    {
        return $this->alimentation;
    }

    public function addAlimentation(self $alimentation): static
    {
        if (!$this->alimentation->contains($alimentation)) {
            $this->alimentation->add($alimentation);
        }

        return $this;
    }

    public function removeAlimentation(self $alimentation): static
    {
        $this->alimentation->removeElement($alimentation);

        return $this;
    }
}
