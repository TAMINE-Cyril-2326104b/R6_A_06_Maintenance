<?php

namespace App\Entity;

use App\Repository\AppartientARepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppartientARepository::class)]
class AppartientA
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Sport $sport = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Epreuve $epreuve = null;

    /**
     * Récupère l'identifiant unique de la relation.
     *
     * @return int|null L'identifiant de l'entité AppartientA
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Récupère le sport associé à cette relation.
     *
     * @return Sport|null Le sport lié à cette épreuve
     */
    public function getSport(): ?Sport
    {
        return $this->sport;
    }

    /**
     * Définit le sport associé à cette relation.
     *
     * @param Sport|null $sport Le sport à associer
     *
     * @return $this
     */
    public function setSport(?Sport $sport): static
    {
        $this->sport = $sport;

        return $this;
    }

    /**
     * Récupère l'épreuve associée à cette relation.
     *
     * @return Epreuve|null L'épreuve liée à ce sport
     */
    public function getEpreuve(): ?Epreuve
    {
        return $this->epreuve;
    }

    /**
     * Définit l'épreuve associée à cette relation.
     *
     * @param Epreuve|null $epreuve L'épreuve à associer
     *
     * @return $this
     */
    public function setEpreuve(?Epreuve $epreuve): static
    {
        $this->epreuve = $epreuve;

        return $this;
    }
}
