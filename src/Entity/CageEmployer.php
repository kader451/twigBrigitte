<?php

namespace App\Entity;

use App\Repository\CageEmployeeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CageEmployeeRepository::class)]
class CageEmployee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?Cage $cage = null;

    #[ORM\ManyToOne]
    private ?Employer $employee = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCage(): ?Cage
    {
        return $this->cage;
    }

    public function setCage(?Cage $cage): static
    {
        $this->cage = $cage;

        return $this;
    }

    public function getEmployee(): ?Employer
    {
        return $this->employee;
    }

    public function setEmployee(?Employer $employee): static
    {
        $this->employee = $employee;

        return $this;
    }
}
