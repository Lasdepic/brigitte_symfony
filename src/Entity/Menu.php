<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type_menu = null;

    #[ORM\Column]
    private ?int $quantite_viande = null;

    #[ORM\Column]
    private ?int $quantite_legume = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeMenu(): ?string
    {
        return $this->type_menu;
    }

    public function setTypeMenu(string $type_menu): static
    {
        $this->type_menu = $type_menu;

        return $this;
    }

    public function getQuantiteViande(): ?int
    {
        return $this->quantite_viande;
    }

    public function setQuantiteViande(int $quantite_viande): static
    {
        $this->quantite_viande = $quantite_viande;

        return $this;
    }

    public function getQuantiteLegume(): ?int
    {
        return $this->quantite_legume;
    }

    public function setQuantiteLegume(int $quantite_legume): static
    {
        $this->quantite_legume = $quantite_legume;

        return $this;
    }
}
