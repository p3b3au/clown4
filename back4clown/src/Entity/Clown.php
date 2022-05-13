<?php

namespace App\Entity;

use App\Repository\ClownRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClownRepository::class)]
class Clown
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $pseudo;

    #[ORM\Column(type: 'boolean')]
    private $actif;

    #[ORM\Column(type: 'boolean')]
    private $homme;

    #[ORM\Column(type: 'boolean')]
    private $musicien;

    #[ORM\Column(type: 'string', length: 50)]
    private $couleur;
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function isActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    public function isHomme(): ?bool
    {
        return $this->homme;
    }

    public function setHomme(bool $homme): self
    {
        $this->homme = $homme;

        return $this;
    }

    public function isMusicien(): ?bool
    {
        return $this->musicien;
    }

    public function setMusicien(bool $musicien): self
    {
        $this->musicien = $musicien;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getInterv(): ?Interv
    {
        return $this->interv;
    }

    public function setInterv(?Interv $interv): self
    {
        $this->interv = $interv;

        return $this;
    }
}
