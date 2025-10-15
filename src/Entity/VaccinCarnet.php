<?php

namespace App\Entity;

use App\Repository\VaccinCarnetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VaccinCarnetRepository::class)]
class VaccinCarnet
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
