<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IssuesRepository")
 */
class Issues
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
    private $nom_issue;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users", inversedBy="issues")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userId;

    /**
     * @ORM\Column(type="string", columnDefinition="enum('issue', 'feature')")
     */
    private $type;

    /**
     * @ORM\Column(type="string", columnDefinition="enum('dev', 'rejected', 'accepted', 'done', 'studying')", nullable=true)
     */
    private $state;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AssocIssueNotation", mappedBy="issueId")
     */
    private $assocIssueNotations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AssocIssueCommentaire", mappedBy="issueId")
     */
    private $assocIssueCommentaires;

    public function __construct()
    {
        $this->assocIssueNotations = new ArrayCollection();
        $this->assocIssueCommentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomIssue(): ?string
    {
        return $this->nom_issue;
    }

    public function setNomIssue(?string $nom_issue): self
    {
        $this->nom_issue = $nom_issue;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUserId(): ?Users
    {
        return $this->userId;
    }

    public function setUserId(?Users $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return iterable|AssocIssueNotation[]
     */
    public function getAssocIssueNotations(): iterable
    {
        return $this->assocIssueNotations;
    }

    public function addAssocIssueNotation(AssocIssueNotation $assocIssueNotation): self
    {
        if (!$this->assocIssueNotations->contains($assocIssueNotation)) {
            $this->assocIssueNotations[] = $assocIssueNotation;
            $assocIssueNotation->setIssueId($this);
        }

        return $this;
    }

    public function removeAssocIssueNotation(AssocIssueNotation $assocIssueNotation): self
    {
        if ($this->assocIssueNotations->contains($assocIssueNotation)) {
            $this->assocIssueNotations->removeElement($assocIssueNotation);
            // set the owning side to null (unless already changed)
            if ($assocIssueNotation->getIssueId() === $this) {
                $assocIssueNotation->setIssueId(null);
            }
        }

        return $this;
    }

    /**
     * @return iterable|AssocIssueCommentaire[]
     */
    public function getAssocIssueCommentaires(): iterable
    {
        return $this->assocIssueCommentaires;
    }

    public function addAssocIssueCommentaire(AssocIssueCommentaire $assocIssueCommentaire): self
    {
        if (!$this->assocIssueCommentaires->contains($assocIssueCommentaire)) {
            $this->assocIssueCommentaires[] = $assocIssueCommentaire;
            $assocIssueCommentaire->setIssueId($this);
        }

        return $this;
    }

    public function removeAssocIssueCommentaire(AssocIssueCommentaire $assocIssueCommentaire): self
    {
        if ($this->assocIssueCommentaires->contains($assocIssueCommentaire)) {
            $this->assocIssueCommentaires->removeElement($assocIssueCommentaire);
            // set the owning side to null (unless already changed)
            if ($assocIssueCommentaire->getIssueId() === $this) {
                $assocIssueCommentaire->setIssueId(null);
            }
        }

        return $this;
    }
}
