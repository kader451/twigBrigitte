<?php

namespace App\Entity;


use App\Repository\CageEmployerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: CageEmployerRepository::class)]
class CageEmployer

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
    private Collection $employer;

    public function __construct()
    {
        $this->cage = new ArrayCollection();
        $this->employer = new ArrayCollection();
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
    public function getEmployer(): Collection
    {
        return $this->employer;
    }

    public function addEmployer(self $employer): static
    {
        if (!$this->employer->contains($employer)) {
            $this->employer->add($employer);
        }

        return $this;
    }

    public function removeEmployer(self $employer): static
    {
        $this->employer->removeElement($employer);

        return $this;
    }

}
