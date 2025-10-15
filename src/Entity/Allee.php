<?php

namespace App\Entity;

use App\Repository\AlleeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlleeRepository::class)]
class Allee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $num_allee = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumAllee(): ?int
    {
        return $this->num_allee;
    }

    public function setNumAllee(int $num_allee): static
    {
        $this->num_allee = $num_allee;

        return $this;
    }
}
