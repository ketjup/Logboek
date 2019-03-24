<?php
// src/Entity/User.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Logboek", mappedBy="chauffeur")
     */
    private $logboeks;

    public function __construct()
    {
        parent::__construct();
        $this->logboeks = new ArrayCollection();
        // your own logic
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
            $logboek->setChauffeur($this);
        }

        return $this;
    }

    public function removeLogboek(Logboek $logboek): self
    {
        if ($this->logboeks->contains($logboek)) {
            $this->logboeks->removeElement($logboek);
            // set the owning side to null (unless already changed)
            if ($logboek->getChauffeur() === $this) {
                $logboek->setChauffeur(null);
            }
        }

        return $this;
    }
}