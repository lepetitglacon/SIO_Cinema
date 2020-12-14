<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FilmRepository::class)
 */
class Film
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
     * @ORM\Column(type="text")
     */
    private $synopsys;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $realisateur;

    /**
     * @ORM\OneToMany(targetEntity=Projection::class, mappedBy="film", orphanRemoval=true)
     */
    private $projections;

    public function __construct()
    {
        $this->projections = new ArrayCollection();
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

    public function getSynopsys(): ?string
    {
        return $this->synopsys;
    }

    public function setSynopsys(string $synopsys): self
    {
        $this->synopsys = $synopsys;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getRealisateur(): ?string
    {
        return $this->realisateur;
    }

    public function setRealisateur(string $realisateur): self
    {
        $this->realisateur = $realisateur;

        return $this;
    }

    /**
     * @return Collection|Projection[]
     */
    public function getProjections(): Collection
    {
        return $this->projections;
    }

    public function addProjection(Projection $projection): self
    {
        if (!$this->projections->contains($projection)) {
            $this->projections[] = $projection;
            $projection->setFilm($this);
        }

        return $this;
    }

    public function removeProjection(Projection $projection): self
    {
        if ($this->projections->removeElement($projection)) {
            // set the owning side to null (unless already changed)
            if ($projection->getFilm() === $this) {
                $projection->setFilm(null);
            }
        }

        return $this;
    }
}
