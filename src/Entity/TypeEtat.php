<?php

namespace App\Entity;

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
}
