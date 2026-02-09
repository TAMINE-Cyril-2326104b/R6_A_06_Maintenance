<?php

namespace App\Entity;

use App\Repository\ChampionnatRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChampionnatRepository::class)]
class Championnat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Sport $sport = null;

    /**
     * Récupère l'identifiant d'un championnat.
     * @return int|null L'identifiant d'un championnat
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Récupère le nom d'un championnat
     * @return string|null Le nom d'un championnat
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * Met à jour le nom d'un championnat
     * @param string $nom Un nom de championnat
     * @return $this
     */
    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

}
