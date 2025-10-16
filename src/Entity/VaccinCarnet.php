<?php

namespace App\Entity;

use App\Repository\VaccinCarnetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VaccinCarnetRepository::class)]
class VaccinCarnet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?CarnetSante $carnet = null;

    #[ORM\ManyToOne]
    private ?Vaccin $vaccin = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCarnet(): ?CarnetSante
    {
        return $this->carnet;
    }

    public function setCarnet(?CarnetSante $carnet): static
    {
        $this->carnet = $carnet;

        return $this;
    }

    public function getVaccin(): ?Vaccin
    {
        return $this->vaccin;
    }

    public function setVaccin(?Vaccin $vaccin): static
    {
        $this->vaccin = $vaccin;

        return $this;
    }
}
