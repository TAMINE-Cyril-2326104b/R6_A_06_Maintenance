<?php

namespace App\Entity;

use App\Repository\SportRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SportRepository::class)]
class Sport
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    /**
     * Renvoie l'identifiant d'un sport
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Renvoie le nom d'un sport
     * @return string|null
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * Met à jour le nom d'un sport
     * @param string $nom
     * @return $this
     */
    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Récupère le type de sport
     * @return string|null Le type d'un sport
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Met à jour le type du sport
     * @param string $type Un type de sport
     * @return $this
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
