<?php

namespace App\Entity;

use App\Repository\MaladieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaladieRepository::class)]
class Maladie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_maladie = null;

    #[ORM\ManyToOne(inversedBy: 'maladies')]
    private ?Animal $animal = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMaladie(): ?string
    {
        return $this->nom_maladie;
    }

    public function setNomMaladie(string $nom_maladie): static
    {
        $this->nom_maladie = $nom_maladie;

        return $this;
    }

    public function getAnimal(): ?Animal
    {
        return $this->animal;
    }

    public function setAnimal(?Animal $animal): static
    {
        $this->animal = $animal;

        return $this;
    }
}
