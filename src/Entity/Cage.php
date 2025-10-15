<?php

namespace App\Entity;

use App\Repository\CageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CageRepository::class)]
class Cage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $num_cage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumCage(): ?int
    {
        return $this->num_cage;
    }

    public function setNumCage(int $num_cage): static
    {
        $this->num_cage = $num_cage;

        return $this;
    }
}
