<?php

namespace App\Entity;

use App\Repository\EpreuveRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EpreuveRepository::class)]
class Epreuve
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    /**
     * Récupère le nom de l'identifiant de l'épreuve.
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Récupère le nom d'une épreuve.
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * Met à jour le nom d'une épreuve.
     *
     * @return $this
     */
    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function __toString(): string
    {
        return (string) $this->nom;
    }

}
