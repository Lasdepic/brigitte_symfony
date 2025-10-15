<?php

namespace App\Entity;

use App\Enum\Sexe;
use App\Repository\EmployesRepository;
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
}
