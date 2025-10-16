<?php

namespace App\Entity;

use App\Repository\AlleeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @var Collection<int, Cage>
     */
    #[ORM\OneToMany(targetEntity: Cage::class, mappedBy: 'allee')]
    private Collection $cage;

    /**
     * @var Collection<int, Employes>
     */
    #[ORM\ManyToMany(targetEntity: Employes::class, mappedBy: 'allee')]
    private Collection $employes;

    public function __construct()
    {
        $this->cage = new ArrayCollection();
        $this->employes = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Cage>
     */
    public function getCage(): Collection
    {
        return $this->cage;
    }

    public function addCage(Cage $cage): static
    {
        if (!$this->cage->contains($cage)) {
            $this->cage->add($cage);
            $cage->setAllee($this);
        }

        return $this;
    }

    public function removeCage(Cage $cage): static
    {
        if ($this->cage->removeElement($cage)) {
            // set the owning side to null (unless already changed)
            if ($cage->getAllee() === $this) {
                $cage->setAllee(null);
            }
        }

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
            $employe->addAllee($this);
        }

        return $this;
    }

    public function removeEmploye(Employes $employe): static
    {
        if ($this->employes->removeElement($employe)) {
            $employe->removeAllee($this);
        }

        return $this;
    }
}
