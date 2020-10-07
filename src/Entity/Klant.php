<?php

namespace App\Entity;

use App\Repository\KlantRepository;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=KlantRepository::class)
 */
class Klant
{

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $klantId;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $voornaam;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $achternaam;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $kenteken;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $merk;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKlantId(): ?int
    {
        return $this->klantId;
    }

    public function setKlantId(int $klantId): self
    {
        $this->klantId = $klantId;

        return $this;
    }

    public function getVoornaam(): ?string
    {
        return $this->voornaam;
    }

    public function setVoornaam(?string $voornaam): self
    {
        $this->voornaam = $voornaam;

        return $this;
    }

    public function getAchternaam(): ?string
    {
        return $this->achternaam;
    }

    public function setAchternaam(?string $achternaam): self
    {
        $this->achternaam = $achternaam;

        return $this;
    }

    public function getMerk(): ?string
    {
        return $this->merk;
    }

    public function setMerk(?string $merk): self
    {
        $this->merk = $merk;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getKenteken(): ?string
    {
        return $this->kenteken;
    }

    public function setKenteken(?string $kenteken): self
    {
        $this->kenteken = $kenteken;

        return $this;
    }
}
