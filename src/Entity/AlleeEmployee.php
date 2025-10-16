<?php

namespace App\Entity;

use App\Repository\AlleeEmployeeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlleeEmployeeRepository::class)]
class AlleeEmployee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?Allee $allee = null;

    #[ORM\ManyToOne]
    private ?Employer $employer = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAllee(): ?Allee
    {
        return $this->allee;
    }

    public function setAllee(?Allee $allee): static
    {
        $this->allee = $allee;

        return $this;
    }

    public function getEmployer(): ?Employer
    {
        return $this->employer;
    }

    public function setEmployer(?Employer $employer): static
    {
        $this->employer = $employer;

        return $this;
    }
}
