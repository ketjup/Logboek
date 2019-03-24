<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TruckRepository")
 */
class Truck
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $kenteken;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $merk;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $bouwjaar;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Logboek", mappedBy="truck")
     */
    private $logboeks;

    public function __construct()
    {
        $this->logboeks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKenteken(): ?string
    {
        return $this->kenteken;
    }

    public function setKenteken(string $kenteken): self
    {
        $this->kenteken = $kenteken;

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

    public function getBouwjaar(): ?\DateTimeInterface
    {
        return $this->bouwjaar;
    }

    public function setBouwjaar(?\DateTimeInterface $bouwjaar): self
    {
        $this->bouwjaar = $bouwjaar;

        return $this;
    }

    /**
     * @return Collection|Logboek[]
     */
    public function getLogboeks(): Collection
    {
        return $this->logboeks;
    }

    public function addLogboek(Logboek $logboek): self
    {
        if (!$this->logboeks->contains($logboek)) {
            $this->logboeks[] = $logboek;
            $logboek->setTruck($this);
        }

        return $this;
    }

    public function removeLogboek(Logboek $logboek): self
    {
        if ($this->logboeks->contains($logboek)) {
            $this->logboeks->removeElement($logboek);
            // set the owning side to null (unless already changed)
            if ($logboek->getTruck() === $this) {
                $logboek->setTruck(null);
            }
        }

        return $this;
    }
}
