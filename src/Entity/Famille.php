<?php

namespace App\Entity;

use App\Repository\FamilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FamilleRepository::class)]
class Famille
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_famille = null;

    /**
     * @var Collection<int, Espece>
     */
    #[ORM\OneToMany(targetEntity: Espece::class, mappedBy: 'famille')]
    private Collection $especes;

    #[ORM\ManyToOne(inversedBy: 'familles')]
    private ?Ordre $ordre = null;

    public function __construct()
    {
        $this->especes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFamille(): ?string
    {
        return $this->nom_famille;
    }

    public function setNomFamille(string $nom_famille): static
    {
        $this->nom_famille = $nom_famille;

        return $this;
    }

    /**
     * @return Collection<int, Espece>
     */
    public function getEspeces(): Collection
    {
        return $this->especes;
    }

    public function addEspece(Espece $espece): static
    {
        if (!$this->especes->contains($espece)) {
            $this->especes->add($espece);
            $espece->setFamille($this);
        }

        return $this;
    }

    public function removeEspece(Espece $espece): static
    {
        if ($this->especes->removeElement($espece)) {
            // set the owning side to null (unless already changed)
            if ($espece->getFamille() === $this) {
                $espece->setFamille(null);
            }
        }

        return $this;
    }

    public function getOrdre(): ?Ordre
    {
        return $this->ordre;
    }

    public function setOrdre(?Ordre $ordre): static
    {
        $this->ordre = $ordre;

        return $this;
    }
}
