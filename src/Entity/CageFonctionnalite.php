<?php

namespace App\Entity;

use App\Repository\CageFonctionnaliteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CageFonctionnaliteRepository::class)]
class CageFonctionnalite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
