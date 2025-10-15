<?php

namespace App\Entity;

use App\Repository\RefugeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RefugeRepository::class)]
class Refuge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55, nullable: true)]
    private ?string $fonctionalite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFonctionalite(): ?string
    {
        return $this->fonctionalite;
    }

    public function setFonctionalite(?string $fonctionalite): static
    {
        $this->fonctionalite = $fonctionalite;

        return $this;
    }
}
