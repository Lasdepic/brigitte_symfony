<?php

namespace App\Entity;

use App\Repository\CarnetSanteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarnetSanteRepository::class)]
class CarnetSante
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $vaccins = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_vaccination = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_future_vaccination = null;

    #[ORM\OneToOne(inversedBy: 'carnetSante', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Animal $animal = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVaccins(): ?string
    {
        return $this->vaccins;
    }

    public function setVaccins(string $vaccins): static
    {
        $this->vaccins = $vaccins;

        return $this;
    }

    public function getDateVaccination(): ?\DateTime
    {
        return $this->date_vaccination;
    }

    public function setDateVaccination(\DateTime $date_vaccination): static
    {
        $this->date_vaccination = $date_vaccination;

        return $this;
    }

    public function getDateFutureVaccination(): ?\DateTime
    {
        return $this->date_future_vaccination;
    }

    public function setDateFutureVaccination(\DateTime $date_future_vaccination): static
    {
        $this->date_future_vaccination = $date_future_vaccination;

        return $this;
    }

    public function getAnimal(): ?Animal
    {
        return $this->animal;
    }

    public function setAnimal(Animal $animal): static
    {
        $this->animal = $animal;

        return $this;
    }
}
