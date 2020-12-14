<?php

namespace App\Entity;

use App\Repository\TicketRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TicketRepository::class)
 */
class Ticket
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
    private $nomAcheteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $moyenPayment;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\Column(type="boolean")
     */
    private $reserve;

    /**
     * @ORM\ManyToOne(targetEntity=Seance::class, inversedBy="ticket")
     * @ORM\JoinColumn(nullable=false)
     */
    private $seance;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAcheteur(): ?string
    {
        return $this->nomAcheteur;
    }

    public function setNomAcheteur(string $nomAcheteur): self
    {
        $this->nomAcheteur = $nomAcheteur;

        return $this;
    }

    public function getMoyenPayment(): ?string
    {
        return $this->moyenPayment;
    }

    public function setMoyenPayment(string $moyenPayment): self
    {
        $this->moyenPayment = $moyenPayment;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getReserve(): ?bool
    {
        return $this->reserve;
    }

    public function setReserve(bool $reserve): self
    {
        $this->reserve = $reserve;

        return $this;
    }

    public function getSeance(): ?Seance
    {
        return $this->seance;
    }

    public function setSeance(?Seance $seance): self
    {
        $this->seance = $seance;

        return $this;
    }
}
