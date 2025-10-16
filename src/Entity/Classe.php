<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClasseRepository::class)]
class Classe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $nom = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'ordre')]
    private ?self $ordre = null;

    public function __construct()
    {
        $this->ordre = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getOrdre(): ?self
    {
        return $this->ordre;
    }

    public function setOrdre(?self $ordre): static
    {
        $this->ordre = $ordre;

        return $this;
    }

    public function addOrdre(self $ordre): static
    {
        if (!$this->ordre->contains($ordre)) {
            $this->ordre->add($ordre);
            $ordre->setOrdre($this);
        }

        return $this;
    }

    public function removeOrdre(self $ordre): static
    {
        if ($this->ordre->removeElement($ordre)) {
            // set the owning side to null (unless already changed)
            if ($ordre->getOrdre() === $this) {
                $ordre->setOrdre(null);
            }
        }

        return $this;
    }
}
