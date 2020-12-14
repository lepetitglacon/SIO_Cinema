<?php

namespace App\Entity;

use App\Repository\CinemaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CinemaRepository::class)
 */
class Cinema
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombreSalles;

    /**
     * @ORM\OneToMany(targetEntity=Salle::class, mappedBy="cinema", orphanRemoval=true)
     */
    private $salle;

    public function __construct()
    {
        $this->salle = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNombreSalles(): ?int
    {
        return $this->nombreSalles;
    }

    public function setNombreSalles(int $nombreSalles): self
    {
        $this->nombreSalles = $nombreSalles;

        return $this;
    }

    /**
     * @return Collection|Salle[]
     */
    public function getSalle(): Collection
    {
        return $this->salle;
    }

    public function addSalle(Salle $salle): self
    {
        if (!$this->salle->contains($salle)) {
            $this->salle[] = $salle;
            $salle->setCinema($this);
        }

        return $this;
    }

    public function removeSalle(Salle $salle): self
    {
        if ($this->salle->removeElement($salle)) {
            // set the owning side to null (unless already changed)
            if ($salle->getCinema() === $this) {
                $salle->setCinema(null);
            }
        }

        return $this;
    }
}
