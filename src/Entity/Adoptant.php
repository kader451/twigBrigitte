<?php

namespace App\Entity;

use App\Repository\AdoptantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdoptantRepository::class)]
class Adoptant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $nom = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'adresseAdoptant')]
    private ?self $adresseAdoptant = null;

    public function __construct()
    {
        $this->adresseAdoptant = new ArrayCollection();
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

    public function getAdresseAdoptant(): ?self
    {
        return $this->adresseAdoptant;
    }

    public function setAdresseAdoptant(?self $adresseAdoptant): static
    {
        $this->adresseAdoptant = $adresseAdoptant;

        return $this;
    }

    public function addAdresseAdoptant(self $adresseAdoptant): static
    {
        if (!$this->adresseAdoptant->contains($adresseAdoptant)) {
            $this->adresseAdoptant->add($adresseAdoptant);
            $adresseAdoptant->setAdresseAdoptant($this);
        }

        return $this;
    }

    public function removeAdresseAdoptant(self $adresseAdoptant): static
    {
        if ($this->adresseAdoptant->removeElement($adresseAdoptant)) {
            // set the owning side to null (unless already changed)
            if ($adresseAdoptant->getAdresseAdoptant() === $this) {
                $adresseAdoptant->setAdresseAdoptant(null);
            }
        }

        return $this;
    }
}
