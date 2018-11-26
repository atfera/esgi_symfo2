<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeIssueRepository")
 */
class TypeIssue
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
    private $nom_type_issue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTypeIssue(): ?string
    {
        return $this->nom_type_issue;
    }

    public function setNomTypeIssue(?string $nom_type_issue): self
    {
        $this->nom_type_issue = $nom_type_issue;

        return $this;
    }
}
