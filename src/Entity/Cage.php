<?php

namespace App\Entity;

use App\Repository\CageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @var Collection<int, Animal>
     */
    #[ORM\OneToMany(targetEntity: Animal::class, mappedBy: 'cage')]
    private Collection $animal;

    /**
     * @var Collection<int, Fonctionnalites>
     */
    #[ORM\ManyToMany(targetEntity: Fonctionnalites::class, mappedBy: 'cage')]
    private Collection $fonctionnalites;

    #[ORM\ManyToOne(inversedBy: 'cage')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Allee $allee = null;

    /**
     * @var Collection<int, Employes>
     */
    #[ORM\ManyToMany(targetEntity: Employes::class, mappedBy: 'cage')]
    private Collection $employes;

    public function __construct()
    {
        $this->animal = new ArrayCollection();
        $this->fonctionnalites = new ArrayCollection();
        $this->employes = new ArrayCollection();
    }

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
            $animal->setCage($this);
        }

        return $this;
    }

    public function removeAnimal(Animal $animal): static
    {
        if ($this->animal->removeElement($animal)) {
            // set the owning side to null (unless already changed)
            if ($animal->getCage() === $this) {
                $animal->setCage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Fonctionnalites>
     */
    public function getFonctionnalites(): Collection
    {
        return $this->fonctionnalites;
    }

    public function addFonctionnalite(Fonctionnalites $fonctionnalite): static
    {
        if (!$this->fonctionnalites->contains($fonctionnalite)) {
            $this->fonctionnalites->add($fonctionnalite);
            $fonctionnalite->addCage($this);
        }

        return $this;
    }

    public function removeFonctionnalite(Fonctionnalites $fonctionnalite): static
    {
        if ($this->fonctionnalites->removeElement($fonctionnalite)) {
            $fonctionnalite->removeCage($this);
        }

        return $this;
    }

    public function getAllee(): ?Allee
    {
        return $this->allee;
    }

    public function setAllee(?Allee $allee): static
    {
        $this->allee = $allee;

        return $this;
    }

    /**
     * @return Collection<int, Employes>
     */
    public function getEmployes(): Collection
    {
        return $this->employes;
    }

    public function addEmploye(Employes $employe): static
    {
        if (!$this->employes->contains($employe)) {
            $this->employes->add($employe);
            $employe->addCage($this);
        }

        return $this;
    }

    public function removeEmploye(Employes $employe): static
    {
        if ($this->employes->removeElement($employe)) {
            $employe->removeCage($this);
        }

        return $this;
    }
}
