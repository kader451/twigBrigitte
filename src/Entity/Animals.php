<?php

namespace App\Entity;

use App\Repository\AnimalsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalsRepository::class)]
class Animals
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $sexe = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $dataNaissance = null;

    #[ORM\Column(nullable: true)]
    private ?int $age = null;

    #[ORM\Column(nullable: true)]
    private ?int $numeroIdentification = null;

    #[ORM\Column(nullable: true)]
    private ?bool $adoptable = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $dateArrivÃ©Ãe = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'paysOrigine')]
    private ?self $paysOrigine = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'refuge')]
    private ?self $refuge = null;

    public function __construct()
    {
        $this->paysOrigine = new ArrayCollection();
        $this->refuge = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): static
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getDataNaissance(): ?\DateTime
    {
        return $this->dataNaissance;
    }

    public function setDataNaissance(?\DateTime $dataNaissance): static
    {
        $this->dataNaissance = $dataNaissance;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getNumeroIdentification(): ?int
    {
        return $this->numeroIdentification;
    }

    public function setNumeroIdentification(?int $numeroIdentification): static
    {
        $this->numeroIdentification = $numeroIdentification;

        return $this;
    }

    public function isAdoptable(): ?bool
    {
        return $this->adoptable;
    }

    public function setAdoptable(?bool $adoptable): static
    {
        $this->adoptable = $adoptable;

        return $this;
    }

    public function getDateArrivÃ©Ãe(): ?\DateTime
    {
        return $this->dateArrivÃ©Ãe;
    }

    public function setDateArrivÃ©Ãe(?\DateTime $dateArrivÃ©Ãe): static
    {
        $this->dateArrivÃ©Ãe = $dateArrivÃ©Ãe;

        return $this;
    }

    public function getPaysOrigine(): ?self
    {
        return $this->paysOrigine;
    }

    public function setPaysOrigine(?self $paysOrigine): static
    {
        $this->paysOrigine = $paysOrigine;

        return $this;
    }

    public function addPaysOrigine(self $paysOrigine): static
    {
        if (!$this->paysOrigine->contains($paysOrigine)) {
            $this->paysOrigine->add($paysOrigine);
            $paysOrigine->setPaysOrigine($this);
        }

        return $this;
    }

    public function removePaysOrigine(self $paysOrigine): static
    {
        if ($this->paysOrigine->removeElement($paysOrigine)) {
            // set the owning side to null (unless already changed)
            if ($paysOrigine->getPaysOrigine() === $this) {
                $paysOrigine->setPaysOrigine(null);
            }
        }

        return $this;
    }

    public function getRefuge(): ?self
    {
        return $this->refuge;
    }

    public function setRefuge(?self $refuge): static
    {
        $this->refuge = $refuge;

        return $this;
    }

    public function addRefuge(self $refuge): static
    {
        if (!$this->refuge->contains($refuge)) {
            $this->refuge->add($refuge);
            $refuge->setRefuge($this);
        }

        return $this;
    }

    public function removeRefuge(self $refuge): static
    {
        if ($this->refuge->removeElement($refuge)) {
            // set the owning side to null (unless already changed)
            if ($refuge->getRefuge() === $this) {
                $refuge->setRefuge(null);
            }
        }

        return $this;
    }
}
