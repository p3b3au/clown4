<?php

namespace App\Entity;

use App\Repository\IntervRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Lieu;

#[ORM\Entity(repositoryClass: IntervRepository::class)]
class Interv
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $dateheure;

    #[ORM\ManyToOne(targetEntity: Clown::class, fetch:"EAGER")]
    public $clownA;

    #[ORM\ManyToOne(targetEntity: Clown::class, fetch:"EAGER")]
    public $clownB;

    #[ORM\ManyToOne(targetEntity: Lieu::class, fetch:"EAGER")]
    private $lieu;

    #[ORM\Column(type: 'integer')]
    private $statut;

    public function __construct()
    {
        $this->clownA = new ArrayCollection();
        $this->clownB = new ArrayCollection();
        $this->lieu = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateheure(): ?\DateTimeInterface
    {
        return $this->dateheure;
    }

    public function setDateheure(\DateTimeInterface $dateheure): self
    {
        $this->dateheure = $dateheure;

        return $this;
    }

    /**
     * @return Collection<int, Clown>
     */
    public function getClownA(): ?Clown
    {
        return $this->clownA;
    }

    public function getApiClownA()
    {
        $va = $this->clownA;
        $val = (array)$va;
        $values = array_values($val);
        return $values;
    }

    public function getApiClownB()
    {
        $va = $this->clownB;
        $val = (array)$va;
        $values = array_values($val);
        return $values;
    }

    public function addClownA(Clown $clownA): self
    {
        if (!$this->clownA->contains($clownA)) {
            $this->clownA[] = $clownA;
            $clownA->setInterv($this);
        }

        return $this;
    }

    public function removeClownA(Clown $clownA): self
    {
        if ($this->clownA->removeElement($clownA)) {
            // set the owning side to null (unless already changed)
            if ($clownA->getInterv() === $this) {
                $clownA->setInterv(null);
            }
        }

        return $this;
    }

    public function getClownB(): ?Clown
    {
        return $this->clownB;
    }

    public function setClownB(?Clown $clownB): self
    {
        $this->clownB = $clownB;

        return $this;
    }

    
    /**
     * @return Collection<int, Lieu>
     */
    public function getLieu(): ?Lieu
    {
        return $this->lieu;
    }

    public function GetApiLieu()
    {
        $va = $this->lieu;
        $val = (array)$va;
        $values = array_values($val);
        
        return $values;
    }

    public function addLieu(Lieu $lieu): self
    {
        if (!$this->lieu->contains($lieu)) {
            $this->lieu[] = $lieu;
            $lieu->setInterv($this);
        }

        return $this;
    }

    public function removeLieu(Lieu $lieu): self
    {
        if ($this->lieu->removeElement($lieu)) {
            // set the owning side to null (unless already changed)
            if ($lieu->getInterv() === $this) {
                $lieu->setInterv(null);
            }
        }

        return $this;
    }

    /**
     * Get the value of statut
     */ 
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     *
     * @return  self
     */ 
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }
}
