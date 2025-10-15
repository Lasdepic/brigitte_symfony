<?php

namespace App\Entity;

use App\Enum\Sexe;
use App\Repository\AnimalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_naissance = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 10)]
    private ?string $num_identification = null;

    #[ORM\Column(enumType: Sexe::class)]
    private ?Sexe $sexe = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_arrivee = null;

    #[ORM\Column]
    private ?bool $est_adoptable = null;

    #[ORM\ManyToOne(inversedBy: 'id_animal')]
    private ?Espece $espece = null;

    #[ORM\ManyToOne(inversedBy: 'animal')]
    private ?Origine $origine = null;

    #[ORM\OneToOne(mappedBy: 'animal', cascade: ['persist', 'remove'])]
    private ?CarnetSante $carnetSante = null;

    /**
     * @var Collection<int, Maladie>
     */
    #[ORM\OneToMany(targetEntity: Maladie::class, mappedBy: 'animal')]
    private Collection $maladies;

    public function __construct()
    {
        $this->maladies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTime
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTime $date_naissance): static
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getNumIdentification(): ?string
    {
        return $this->num_identification;
    }

    public function setNumIdentification(string $num_identification): static
    {
        $this->num_identification = $num_identification;

        return $this;
    }

    public function getSexe(): ?Sexe
    {
        return $this->sexe;
    }

    public function setSexe(Sexe $sexe): static
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getDateArrivee(): ?\DateTime
    {
        return $this->date_arrivee;
    }

    public function setDateArrivee(\DateTime $date_arrivee): static
    {
        $this->date_arrivee = $date_arrivee;

        return $this;
    }

    public function isEstAdoptable(): ?bool
    {
        return $this->est_adoptable;
    }

    public function setEstAdoptable(bool $est_adoptable): static
    {
        $this->est_adoptable = $est_adoptable;

        return $this;
    }

    public function getEspece(): ?Espece
    {
        return $this->espece;
    }

    public function setEspece(?Espece $espece): static
    {
        $this->espece = $espece;

        return $this;
    }

    public function getOrigine(): ?Origine
    {
        return $this->origine;
    }

    public function setOrigine(?Origine $origine): static
    {
        $this->origine = $origine;

        return $this;
    }

    public function getCarnetSante(): ?CarnetSante
    {
        return $this->carnetSante;
    }

    public function setCarnetSante(?CarnetSante $carnetSante): static
    {
        // unset the owning side of the relation if necessary
        if ($carnetSante === null && $this->carnetSante !== null) {
            $this->carnetSante->setAnimal(null);
        }

        // set the owning side of the relation if necessary
        if ($carnetSante !== null && $carnetSante->getAnimal() !== $this) {
            $carnetSante->setAnimal($this);
        }

        $this->carnetSante = $carnetSante;

        return $this;
    }

    /**
     * @return Collection<int, Maladie>
     */
    public function getMaladies(): Collection
    {
        return $this->maladies;
    }

    public function addMalady(Maladie $malady): static
    {
        if (!$this->maladies->contains($malady)) {
            $this->maladies->add($malady);
            $malady->setAnimal($this);
        }

        return $this;
    }

    public function removeMalady(Maladie $malady): static
    {
        if ($this->maladies->removeElement($malady)) {
            // set the owning side to null (unless already changed)
            if ($malady->getAnimal() === $this) {
                $malady->setAnimal(null);
            }
        }

        return $this;
    }
}
