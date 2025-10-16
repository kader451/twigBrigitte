<?php

namespace App\Entity;

use App\Repository\CageEmployeeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CageEmployeeRepository::class)]
class CageEmployee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\ManyToMany(targetEntity: self::class)]
    private Collection $cage;

    /**
     * @var Collection<int, self>
     */
    #[ORM\ManyToMany(targetEntity: self::class)]
    private Collection $employee;

    public function __construct()
    {
        $this->cage = new ArrayCollection();
        $this->employee = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, self>
     */
    public function getEmployee(): Collection
    {
        return $this->employee;
    }

    public function addEmployee(self $employee): static
    {
        if (!$this->employee->contains($employee)) {
            $this->employee->add($employee);
        }

        return $this;
    }

    public function removeEmployee(self $employee): static
    {
        $this->employee->removeElement($employee);

        return $this;
    }
}
