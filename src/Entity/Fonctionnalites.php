<?php

namespace App\Entity;

use App\Repository\FonctionnalitesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FonctionnalitesRepository::class)]
class Fonctionnalites
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $num_fonctionnalite = null;

    #[ORM\Column(length: 255)]
    private ?string $type_fonctionnalite = null;

    /**
     * @var Collection<int, Cage>
     */
    #[ORM\ManyToMany(targetEntity: Cage::class, inversedBy: 'fonctionnalites')]
    private Collection $cage;

    public function __construct()
    {
        $this->cage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumFonctionnalite(): ?int
    {
        return $this->num_fonctionnalite;
    }

    public function setNumFonctionnalite(int $num_fonctionnalite): static
    {
        $this->num_fonctionnalite = $num_fonctionnalite;

        return $this;
    }

    public function getTypeFonctionnalite(): ?string
    {
        return $this->type_fonctionnalite;
    }

    public function setTypeFonctionnalite(string $type_fonctionnalite): static
    {
        $this->type_fonctionnalite = $type_fonctionnalite;

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
}
