<?php

namespace App\Entity;

use App\Repository\FonctionnalitesRepository;
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
}
