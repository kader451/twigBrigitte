<?php

namespace App\Entity;

use App\Repository\VaccinCarnetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VaccinCarnetRepository::class)]
class VaccinCarnet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\ManyToMany(targetEntity: self::class)]
    private Collection $carnetSante;

    /**
     * @var Collection<int, self>
     */
    #[ORM\ManyToMany(targetEntity: self::class)]
    private Collection $vaccin;

    public function __construct()
    {
        $this->carnetSante = new ArrayCollection();
        $this->vaccin = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, self>
     */
    public function getCarnetSante(): Collection
    {
        return $this->carnetSante;
    }

    public function addCarnetSante(self $carnetSante): static
    {
        if (!$this->carnetSante->contains($carnetSante)) {
            $this->carnetSante->add($carnetSante);
        }

        return $this;
    }

    public function removeCarnetSante(self $carnetSante): static
    {
        $this->carnetSante->removeElement($carnetSante);

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getVaccin(): Collection
    {
        return $this->vaccin;
    }

    public function addVaccin(self $vaccin): static
    {
        if (!$this->vaccin->contains($vaccin)) {
            $this->vaccin->add($vaccin);
        }

        return $this;
    }

    public function removeVaccin(self $vaccin): static
    {
        $this->vaccin->removeElement($vaccin);

        return $this;
    }
}
