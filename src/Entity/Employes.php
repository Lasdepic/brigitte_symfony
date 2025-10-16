<?php

namespace App\Entity;

use App\Enum\Sexe;
use App\Repository\EmployesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployesRepository::class)]
class Employes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_employe = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom_employe = null;

    #[ORM\Column(length: 255)]
    private ?string $num_employe = null;

    #[ORM\Column(enumType: Sexe::class)]
    private ?Sexe $sexe_employe = null;

    #[ORM\Column(length: 255)]
    private ?string $ville_employe = null;

    #[ORM\Column(length: 255)]
    private ?string $type_poste = null;

    /**
     * @var Collection<int, Cage>
     */
    #[ORM\ManyToMany(targetEntity: Cage::class, inversedBy: 'employes')]
    private Collection $cage;

    /**
     * @var Collection<int, Allee>
     */
    #[ORM\ManyToMany(targetEntity: Allee::class, inversedBy: 'employes')]
    private Collection $allee;

    public function __construct()
    {
        $this->cage = new ArrayCollection();
        $this->allee = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEmploye(): ?string
    {
        return $this->nom_employe;
    }

    public function setNomEmploye(string $nom_employe): static
    {
        $this->nom_employe = $nom_employe;

        return $this;
    }

    public function getPrenomEmploye(): ?string
    {
        return $this->prenom_employe;
    }

    public function setPrenomEmploye(string $prenom_employe): static
    {
        $this->prenom_employe = $prenom_employe;

        return $this;
    }

    public function getNumEmploye(): ?string
    {
        return $this->num_employe;
    }

    public function setNumEmploye(string $num_employe): static
    {
        $this->num_employe = $num_employe;

        return $this;
    }

    public function getSexeEmploye(): ?Sexe
    {
        return $this->sexe_employe;
    }

    public function setSexeEmploye(Sexe $sexe_employe): static
    {
        $this->sexe_employe = $sexe_employe;

        return $this;
    }

    public function getVilleEmploye(): ?string
    {
        return $this->ville_employe;
    }

    public function setVilleEmploye(string $ville_employe): static
    {
        $this->ville_employe = $ville_employe;

        return $this;
    }

    public function getTypePoste(): ?string
    {
        return $this->type_poste;
    }

    public function setTypePoste(string $type_poste): static
    {
        $this->type_poste = $type_poste;

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
        }

        return $this;
    }

    public function removeCage(Cage $cage): static
    {
        $this->cage->removeElement($cage);

        return $this;
    }

    /**
     * @return Collection<int, Allee>
     */
    public function getAllee(): Collection
    {
        return $this->allee;
    }

    public function addAllee(Allee $allee): static
    {
        if (!$this->allee->contains($allee)) {
            $this->allee->add($allee);
        }

        return $this;
    }

    public function removeAllee(Allee $allee): static
    {
        $this->allee->removeElement($allee);

        return $this;
    }
}
