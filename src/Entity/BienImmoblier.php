<?php

namespace App\Entity;

use App\Repository\BienImmoblierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BienImmoblierRepository::class)
 */
class BienImmoblier
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $numImmo;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $satut;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\Column(type="boolean")
     */
    private $etat;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Proprietaire::class, inversedBy="bienImmos")
     * @ORM\JoinColumn(name="numprop", referencedColumnName="numprop")
     */
    private $proprietaire;

    /**
     * @param mixed $numImmo
     */
    public function setNumImmo($numImmo): void
    {
        $this->numImmo = $numImmo;
    }


    public function getNumImmo(): ?int
    {
        return $this->numImmo;
    }


    public function getSatut(): ?string
    {
        return $this->satut;
    }

    public function setSatut(string $satut): self
    {
        $this->satut = $satut;

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

    public function getEtat(): ?bool
    {
        return $this->etat;
    }

    public function setEtat(bool $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getProprietaire(): ?Proprietaire
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?Proprietaire $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

}
