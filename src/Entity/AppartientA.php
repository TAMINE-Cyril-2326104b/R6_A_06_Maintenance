<?php

namespace App\Entity;

use App\Repository\AppartientARepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppartientARepository::class)]
class AppartientA
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Epreuve>
     */
    #[ORM\ManyToMany(targetEntity: Epreuve::class, inversedBy: 'suprimer')]
    private Collection $epreuve;

    /**
     * @var Collection<int, Sport>
     */
    #[ORM\ManyToMany(targetEntity: Sport::class)]
    private Collection $sport;

    /**
     * Constructeur de la relation AppartientA.
     *
     * Initialise les collections d'épreuves et de sports.
     */
    public function __construct()
    {
        $this->epreuve = new ArrayCollection();
        $this->sport = new ArrayCollection();
    }

    /**
     * Retourne l'identifiant de la relation.
     *
     * @return int|null l'identifiant ou null si non enregistré
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Retourne la liste des épreuves associées.
     *
     * @return Collection<int, Epreuve> la collection des épreuves
     */
    public function getEpreuve(): Collection
    {
        return $this->epreuve;
    }

    /**
     * Ajoute une épreuve à la relation.
     *
     * @param Epreuve $epreuve l'épreuve à ajouter
     * @return $this
     */
    public function addEpreuve(Epreuve $epreuve): static
    {
        if (!$this->epreuve->contains($epreuve)) {
            $this->epreuve->add($epreuve);
        }

        return $this;
    }

    /**
     * Supprime une épreuve de la relation.
     *
     * @param Epreuve $epreuve l'épreuve à supprimer
     * @return $this
     */
    public function removeEpreuve(Epreuve $epreuve): static
    {
        $this->epreuve->removeElement($epreuve);

        return $this;
    }

    /**
     * Retourne la liste des sports associés.
     *
     * @return Collection<int, Sport> la collection des sports
     */
    public function getSport(): Collection
    {
        return $this->sport;
    }

    /**
     * Ajoute un sport à la relation.
     *
     * @param Sport $sport le sport à ajouter
     * @return $this
     */
    public function addSport(Sport $sport): static
    {
        if (!$this->sport->contains($sport)) {
            $this->sport->add($sport);
        }

        return $this;
    }

    /**
     * Supprime un sport de la relation.
     *
     * @param Sport $sport le sport à supprimer
     * @return $this
     */
    public function removeSport(Sport $sport): static
    {
        $this->sport->removeElement($sport);

        return $this;
    }
}
