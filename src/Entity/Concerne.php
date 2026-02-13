<?php

namespace App\Entity;

use App\Repository\ConcerneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConcerneRepository::class)]
class Concerne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Competition $competition = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Epreuve $epreuve = null;

    /**
     * Récupère l'identifiant de la relation.
     *
     * @return int|null L'identifiant unique de l'entité Concerne
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Récupère la compétition associée à cette relation.
     *
     * @return Competition|null La compétition liée à cette relation
     */
    public function getCompetition(): ?Competition
    {
        return $this->competition;
    }

    /**
     * Met à jour la compétition associée à cette relation.
     *
     * @param Competition|null $competition Une compétition à associer
     *
     * @return $this
     */
    public function setCompetition(?Competition $competition): static
    {
        $this->competition = $competition;

        return $this;
    }

    /**
     * Récupère l'épreuve associée à cette relation.
     *
     * @return Epreuve|null L'épreuve liée à cette relation
     */
    public function getEpreuve(): ?Epreuve
    {
        return $this->epreuve;
    }

    /**
     * Met à jour l'épreuve associée à cette relation.
     *
     * @param Epreuve|null $epreuve Une épreuve à associer
     *
     * @return $this
     */
    public function setEpreuve(?Epreuve $epreuve): static
    {
        $this->epreuve = $epreuve;

        return $this;
    }
}
