<?php

namespace App\Entity;

use App\Repository\EspeceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EspeceRepository::class)]
class Espece
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_espece = null;

    /**
     * @var Collection<int, Animal>
     */
    #[ORM\OneToMany(targetEntity: Animal::class, mappedBy: 'espece')]
    private Collection $id_animal;

    #[ORM\ManyToOne(inversedBy: 'especes')]
    private ?Famille $famille = null;

    public function __construct()
    {
        $this->id_animal = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEspece(): ?string
    {
        return $this->nom_espece;
    }

    public function setNomEspece(string $nom_espece): static
    {
        $this->nom_espece = $nom_espece;

        return $this;
    }

    /**
     * @return Collection<int, Animal>
     */
    public function getIdAnimal(): Collection
    {
        return $this->id_animal;
    }

    public function addIdAnimal(Animal $idAnimal): static
    {
        if (!$this->id_animal->contains($idAnimal)) {
            $this->id_animal->add($idAnimal);
            $idAnimal->setEspece($this);
        }

        return $this;
    }

    public function removeIdAnimal(Animal $idAnimal): static
    {
        if ($this->id_animal->removeElement($idAnimal)) {
            // set the owning side to null (unless already changed)
            if ($idAnimal->getEspece() === $this) {
                $idAnimal->setEspece(null);
            }
        }

        return $this;
    }

    public function getFamille(): ?Famille
    {
        return $this->famille;
    }

    public function setFamille(?Famille $famille): static
    {
        $this->famille = $famille;

        return $this;
    }
}
