<?php

namespace App\Entity;

use App\Repository\MaladieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @var Collection<int, Animal>
     */
    #[ORM\ManyToMany(targetEntity: Animal::class, inversedBy: 'maladies')]
    private Collection $animal;

    public function __construct()
    {
        $this->animal = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Animal>
     */
    public function getAnimal(): Collection
    {
        return $this->animal;
    }

    public function addAnimal(Animal $animal): static
    {
        if (!$this->animal->contains($animal)) {
            $this->animal->add($animal);
        }

        return $this;
    }

    public function removeAnimal(Animal $animal): static
    {
        $this->animal->removeElement($animal);

        return $this;
    }
}
