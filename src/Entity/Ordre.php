<?php

namespace App\Entity;

use App\Repository\OrdreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrdreRepository::class)]
class Ordre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $nom = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'famille')]
    private ?self $famille = null;

    public function __construct()
    {
        $this->famille = new ArrayCollection();
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

    public function getFamille(): ?self
    {
        return $this->famille;
    }

    public function setFamille(?self $famille): static
    {
        $this->famille = $famille;

        return $this;
    }

    public function addFamille(self $famille): static
    {
        if (!$this->famille->contains($famille)) {
            $this->famille->add($famille);
            $famille->setFamille($this);
        }

        return $this;
    }

    public function removeFamille(self $famille): static
    {
        if ($this->famille->removeElement($famille)) {
            // set the owning side to null (unless already changed)
            if ($famille->getFamille() === $this) {
                $famille->setFamille(null);
            }
        }

        return $this;
    }
}
