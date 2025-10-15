<?php

namespace App\Entity;

use App\Repository\MaladieAnimalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaladieAnimalRepository::class)]
class MaladieAnimal
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
    private Collection $maladie;

    public function __construct()
    {
        $this->animals = new ArrayCollection();
        $this->maladie = new ArrayCollection();
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
    public function getMaladie(): Collection
    {
        return $this->maladie;
    }

    public function addMaladie(self $maladie): static
    {
        if (!$this->maladie->contains($maladie)) {
            $this->maladie->add($maladie);
        }

        return $this;
    }

    public function removeMaladie(self $maladie): static
    {
        $this->maladie->removeElement($maladie);

        return $this;
    }
}
