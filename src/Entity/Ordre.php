<?php

namespace App\Entity;

use App\Repository\OrdreRepository;
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
}
