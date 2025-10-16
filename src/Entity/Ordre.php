<?php

namespace App\Entity;

use App\Repository\OrdreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrdreRepository::class)]
class Ordre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_ordre = null;

    /**
     * @var Collection<int, Famille>
     */
    #[ORM\OneToMany(targetEntity: Famille::class, mappedBy: 'ordre')]
    private Collection $familles;

    public function __construct()
    {
        $this->familles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomOrdre(): ?string
    {
        return $this->nom_ordre;
    }

    public function setNomOrdre(string $nom_ordre): static
    {
        $this->nom_ordre = $nom_ordre;

        return $this;
    }

    /**
     * @return Collection<int, Famille>
     */
    public function getFamilles(): Collection
    {
        return $this->familles;
    }

    public function addFamille(Famille $famille): static
    {
        if (!$this->familles->contains($famille)) {
            $this->familles->add($famille);
            $famille->setOrdre($this);
        }

        return $this;
    }

    public function removeFamille(Famille $famille): static
    {
        if ($this->familles->removeElement($famille)) {
            // set the owning side to null (unless already changed)
            if ($famille->getOrdre() === $this) {
                $famille->setOrdre(null);
            }
        }

        return $this;
    }
}
