<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeEtatRepository")
 */
class TypeEtat
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom_type_etat;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Issues", mappedBy="stateId")
     */
    private $issueEtat;

    public function __construct()
    {
        $this->issueEtat = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTypeEtat(): ?string
    {
        return $this->nom_type_etat;
    }

    public function setNomTypeEtat(?string $nom_type_etat): self
    {
        $this->nom_type_etat = $nom_type_etat;

        return $this;
    }

    /**
     * @return iterable|Issues[]
     */
    public function getIssueEtat(): iterable
    {
        return $this->issueEtat;
    }

    public function addIssueEtat(Issues $issueEtat): self
    {
        if (!$this->issueEtat->contains($issueEtat)) {
            $this->issueEtat[] = $issueEtat;
            $issueEtat->setStateId($this);
        }

        return $this;
    }

    public function removeIssueEtat(Issues $issueEtat): self
    {
        if ($this->issueEtat->contains($issueEtat)) {
            $this->issueEtat->removeElement($issueEtat);
            // set the owning side to null (unless already changed)
            if ($issueEtat->getStateId() === $this) {
                $issueEtat->setStateId(null);
            }
        }

        return $this;
    }
}
