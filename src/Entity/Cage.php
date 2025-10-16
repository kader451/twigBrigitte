<?php

namespace App\Entity;

use App\Repository\CageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CageRepository::class)]
class Cage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $capacite = null;

    #[ORM\Column(nullable: true)]
    private ?int $numero = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'allee')]
    private ?self $allee = null;

    public function __construct()
    {
        $this->allee = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCapacite(): ?int
    {
        return $this->capacite;
    }

    public function setCapacite(?int $capacite): static
    {
        $this->capacite = $capacite;

        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(?int $numero): static
    {
        $this->numero = $numero;

        return $this;
    }

    public function getAllee(): ?self
    {
        return $this->allee;
    }

    public function setAllee(?self $allee): static
    {
        $this->allee = $allee;

        return $this;
    }

    public function addAllee(self $allee): static
    {
        if (!$this->allee->contains($allee)) {
            $this->allee->add($allee);
            $allee->setAllee($this);
        }

        return $this;
    }

    public function removeAllee(self $allee): static
    {
        if ($this->allee->removeElement($allee)) {
            // set the owning side to null (unless already changed)
            if ($allee->getAllee() === $this) {
                $allee->setAllee(null);
            }
        }

        return $this;
    }
}
