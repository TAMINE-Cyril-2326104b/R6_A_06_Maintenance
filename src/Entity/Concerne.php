<?php

namespace App\Entity;

use App\Repository\ConcerneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConcerneRepository::class)]
class Concerne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Epreuve>
     */
    #[ORM\ManyToMany(targetEntity: Epreuve::class)]
    private Collection $epreuve;

    /**
     * @var Collection<int, Competition>
     */
    #[ORM\ManyToMany(targetEntity: Competition::class)]
    private Collection $competition;

    /**
     * Constructeur de la relation Concerne.
     *
     * Initialise les collections d'épreuves et de compétitions.
     */
    public function __construct()
    {
        $this->epreuve = new ArrayCollection();
        $this->competition = new ArrayCollection();
    }

    /**
     * Renvoie l'identifiant de la relation.
     *
     * @return int|null l'identifiant ou null si non enregistré
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Retourne la liste des épreuves concernées.
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
     * Retourne la liste des compétitions concernées.
     *
     * @return Collection<int, Competition> la collection des compétitions
     */
    public function getCompetition(): Collection
    {
        return $this->competition;
    }

    /**
     * Ajoute une compétition à la relation.
     *
     * @param Competition $competition la compétition à ajouter
     * @return $this
     */
    public function addCompetition(Competition $competition): static
    {
        if (!$this->competition->contains($competition)) {
            $this->competition->add($competition);
        }

        return $this;
    }

    /**
     * Supprime une compétition de la relation.
     *
     * @param Competition $competition la compétition à supprimer
     * @return $this
     */
    public function removeCompetition(Competition $competition): static
    {
        $this->competition->removeElement($competition);

        return $this;
    }
}
