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
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Sport|null
     */
    public function getSport(): ?Sport
    {
        return $this->sport;
    }

    /**
     * @param Sport|null $sport
     * @return $this
     */
    public function setSport(?Sport $sport): static
    {
        $this->sport = $sport;

        return $this;
    }

    /**
     * @return Epreuve|null
     */
    public function getEpreuve(): ?Epreuve
    {
        return $this->epreuve;
    }

    /**
     * @param Epreuve|null $epreuve
     * @return $this
     */
    public function setEpreuve(?Epreuve $epreuve): static
    {
        $this->epreuve = $epreuve;

        return $this;
    }
}
