<?php

namespace App\Entity;

use App\Repository\CageFonctionnaliteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CageFonctionnaliteRepository::class)]
class CageFonctionnalite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\ManyToMany(targetEntity: self::class)]
    private Collection $fonctionnaliteCage;

    /**
     * @var Collection<int, self>
     */
    #[ORM\ManyToMany(targetEntity: self::class)]
    private Collection $cage;

    public function __construct()
    {
        $this->fonctionnaliteCage = new ArrayCollection();
        $this->cage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, self>
     */
    public function getFonctionnaliteCage(): Collection
    {
        return $this->fonctionnaliteCage;
    }

    public function addFonctionnaliteCage(self $fonctionnaliteCage): static
    {
        if (!$this->fonctionnaliteCage->contains($fonctionnaliteCage)) {
            $this->fonctionnaliteCage->add($fonctionnaliteCage);
        }

        return $this;
    }

    public function removeFonctionnaliteCage(self $fonctionnaliteCage): static
    {
        $this->fonctionnaliteCage->removeElement($fonctionnaliteCage);

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getCage(): Collection
    {
        return $this->cage;
    }

    public function addCage(self $cage): static
    {
        if (!$this->cage->contains($cage)) {
            $this->cage->add($cage);
        }

        return $this;
    }

    public function removeCage(self $cage): static
    {
        $this->cage->removeElement($cage);

        return $this;
    }
}
