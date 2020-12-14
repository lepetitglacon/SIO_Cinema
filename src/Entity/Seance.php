<?php

namespace App\Entity;

use App\Repository\SeanceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SeanceRepository::class)
 */
class Seance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time")
     */
    private $heure;

    /**
     * @ORM\ManyToOne(targetEntity=Projection::class, inversedBy="seance")
     * @ORM\JoinColumn(nullable=false)
     */
    private $projection;

    /**
     * @ORM\OneToMany(targetEntity=Ticket::class, mappedBy="seance", orphanRemoval=true)
     */
    private $ticket;

    public function __construct()
    {
        $this->ticket = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->heure;
    }

    public function setHeure(\DateTimeInterface $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getProjection(): ?Projection
    {
        return $this->projection;
    }

    public function setProjection(?Projection $projection): self
    {
        $this->projection = $projection;

        return $this;
    }

    /**
     * @return Collection|Ticket[]
     */
    public function getTicket(): Collection
    {
        return $this->ticket;
    }

    public function addTicket(Ticket $ticket): self
    {
        if (!$this->ticket->contains($ticket)) {
            $this->ticket[] = $ticket;
            $ticket->setSeance($this);
        }

        return $this;
    }

    public function removeTicket(Ticket $ticket): self
    {
        if ($this->ticket->removeElement($ticket)) {
            // set the owning side to null (unless already changed)
            if ($ticket->getSeance() === $this) {
                $ticket->setSeance(null);
            }
        }

        return $this;
    }
}
