<?php

namespace App\Entity;

use App\Repository\CompetitionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetitionRepository::class)]
class Competition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Championnat $championnat = null;

    /**
     * Récupère l'identifiant d'une compétition
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Récupère le nom d'une compétition
     * @return string|null
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * Met à jour le nom d'une compétition
     * @param string $nom
     * @return $this
     */
    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Récupère un championnat.
     * @return Championnat|null
     */
    public function getChampionnat(): ?Championnat
    {
        return $this->championnat;
    }

    /**
     * Met à jour un championnat d'une compétition.
     * @param Championnat|null $championnat
     * @return $this
     */
    public function setChampionnat(?Championnat $championnat): static
    {
        $this->championnat = $championnat;

        return $this;
    }
}
