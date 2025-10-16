<?php

namespace App\Entity;

use App\Repository\AlleeEmployerRepository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlleeEmployerRepository::class)]
class AlleeEmployer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\ManyToMany(targetEntity: self::class)]
    private Collection $allee;

    /**
     * @var Collection<int, self>
     */
    #[ORM\ManyToMany(targetEntity: self::class)]
    private Collection $employer;

    public function __construct()
    {
        $this->allee = new ArrayCollection();
        $this->employer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, self>
     */
    public function getAllee(): Collection
    {
        return $this->allee;
    }

    public function addAllee(self $allee): static
    {
        if (!$this->allee->contains($allee)) {
            $this->allee->add($allee);
        }

        return $this;
    }

    public function removeAllee(self $allee): static
    {
        $this->allee->removeElement($allee);

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
