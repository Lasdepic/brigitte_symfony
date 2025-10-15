<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 50)]
    private ?string $sexe = null;

    #[ORM\Column(length: 20)]
    private ?string $numIdentification = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateArrive = null;

    #[ORM\Column]
    private ?bool $estAdoptable = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): static
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getNumIdentification(): ?string
    {
        return $this->numIdentification;
    }

    public function setNumIdentification(string $numIdentification): static
    {
        $this->numIdentification = $numIdentification;

        return $this;
    }

    public function getDateArrive(): ?\DateTime
    {
        return $this->dateArrive;
    }

    public function setDateArrive(\DateTime $dateArrive): static
    {
        $this->dateArrive = $dateArrive;

        return $this;
    }

    public function isEstAdoptable(): ?bool
    {
        return $this->estAdoptable;
    }

    public function setEstAdoptable(bool $estAdoptable): static
    {
        $this->estAdoptable = $estAdoptable;

        return $this;
    }
}
