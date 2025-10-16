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

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'classe')]
    private ?self $classe = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'adoptant')]
    private ?self $adoptants = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'adoptants')]
    private Collection $adoptant;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'cage')]
    private ?self $cage = null;

    public function __construct()
    {
        $this->classe = new ArrayCollection();
        $this->adoptant = new ArrayCollection();
        $this->cage = new ArrayCollection();
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

    public function getClasse(): ?self
    {
        return $this->classe;
    }

    public function setClasse(?self $classe): static
    {
        $this->classe = $classe;

        return $this;
    }

    public function addClasse(self $classe): static
    {
        if (!$this->classe->contains($classe)) {
            $this->classe->add($classe);
            $classe->setClasse($this);
        }

        return $this;
    }

    public function removeClasse(self $classe): static
    {
        if ($this->classe->removeElement($classe)) {
            // set the owning side to null (unless already changed)
            if ($classe->getClasse() === $this) {
                $classe->setClasse(null);
            }
        }

        return $this;
    }

    public function getAdoptants(): ?self
    {
        return $this->adoptants;
    }

    public function setAdoptants(?self $adoptants): static
    {
        $this->adoptants = $adoptants;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getAdoptant(): Collection
    {
        return $this->adoptant;
    }

    public function addAdoptant(self $adoptant): static
    {
        if (!$this->adoptant->contains($adoptant)) {
            $this->adoptant->add($adoptant);
            $adoptant->setAdoptants($this);
        }

        return $this;
    }

    public function removeAdoptant(self $adoptant): static
    {
        if ($this->adoptant->removeElement($adoptant)) {
            // set the owning side to null (unless already changed)
            if ($adoptant->getAdoptants() === $this) {
                $adoptant->setAdoptants(null);
            }
        }

        return $this;
    }

    public function getCage(): ?self
    {
        return $this->cage;
    }

    public function setCage(?self $cage): static
    {
        $this->cage = $cage;

        return $this;
    }

    public function addCage(self $cage): static
    {
        if (!$this->cage->contains($cage)) {
            $this->cage->add($cage);
            $cage->setCage($this);
        }

        return $this;
    }

    public function removeCage(self $cage): static
    {
        if ($this->cage->removeElement($cage)) {
            // set the owning side to null (unless already changed)
            if ($cage->getCage() === $this) {
                $cage->setCage(null);
            }
        }

        return $this;
    }
}
