<?php

namespace App\Entity;

use App\Repository\EmployerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployerRepository::class)]
class Employer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(nullable: true)]
    private ?int $age = null;

    #[ORM\Column(length: 55, nullable: true)]
    private ?string $sexe = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'adresseEmployer')]
    private ?self $adresseEmployer = null;

    public function __construct()
    {
        $this->adresseEmployer = new ArrayCollection();
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

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(?string $sexe): static
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getAdresseEmployer(): ?self
    {
        return $this->adresseEmployer;
    }

    public function setAdresseEmployer(?self $adresseEmployer): static
    {
        $this->adresseEmployer = $adresseEmployer;

        return $this;
    }

    public function addAdresseEmployer(self $adresseEmployer): static
    {
        if (!$this->adresseEmployer->contains($adresseEmployer)) {
            $this->adresseEmployer->add($adresseEmployer);
            $adresseEmployer->setAdresseEmployer($this);
        }

        return $this;
    }

    public function removeAdresseEmployer(self $adresseEmployer): static
    {
        if ($this->adresseEmployer->removeElement($adresseEmployer)) {
            // set the owning side to null (unless already changed)
            if ($adresseEmployer->getAdresseEmployer() === $this) {
                $adresseEmployer->setAdresseEmployer(null);
            }
        }

        return $this;
    }
}
