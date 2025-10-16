<?php

namespace App\Entity;

use App\Repository\EspeceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EspeceRepository::class)]
class Espece
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55, nullable: true)]
    private ?string $nom = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'race')]
    private ?self $race = null;

    public function __construct()
    {
        $this->race = new ArrayCollection();
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

    public function getRace(): ?self
    {
        return $this->race;
    }

    public function setRace(?self $race): static
    {
        $this->race = $race;

        return $this;
    }

    public function addRace(self $race): static
    {
        if (!$this->race->contains($race)) {
            $this->race->add($race);
            $race->setRace($this);
        }

        return $this;
    }

    public function removeRace(self $race): static
    {
        if ($this->race->removeElement($race)) {
            // set the owning side to null (unless already changed)
            if ($race->getRace() === $this) {
                $race->setRace(null);
            }
        }

        return $this;
    }
}
