<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Issues", mappedBy="issueTypeId")
     */
    private $typeIssue;

    public function __construct()
    {
        $this->typeIssue = new ArrayCollection();
    }

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

    /**
     * @return iterable|Issues[]
     */
    public function getTypeIssue(): iterable
    {
        return $this->typeIssue;
    }

    public function addTypeIssue(Issues $typeIssue): self
    {
        if (!$this->typeIssue->contains($typeIssue)) {
            $this->typeIssue[] = $typeIssue;
            $typeIssue->setIssueTypeId($this);
        }

        return $this;
    }

    public function removeTypeIssue(Issues $typeIssue): self
    {
        if ($this->typeIssue->contains($typeIssue)) {
            $this->typeIssue->removeElement($typeIssue);
            // set the owning side to null (unless already changed)
            if ($typeIssue->getIssueTypeId() === $this) {
                $typeIssue->setIssueTypeId(null);
            }
        }

        return $this;
    }
}
