<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsersAccountRepository")
 */
class UsersAccount
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
    private $nom_user;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom_user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Issues", mappedBy="userId")
     */
    private $issues;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AssocIssueNotation", mappedBy="userId")
     */
    private $assocIssueNotations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AssocIssueCommentaire", mappedBy="userId")
     */
    private $assocIssueCommentaires;

    public function __construct()
    {
        $this->issues = new ArrayCollection();
        $this->assocIssueNotations = new ArrayCollection();
        $this->assocIssueCommentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomUser(): ?string
    {
        return $this->nom_user;
    }

    public function setNomUser(string $nom_user): self
    {
        $this->nom_user = $nom_user;

        return $this;
    }

    public function getPrenomUser(): ?string
    {
        return $this->prenom_user;
    }

    public function setPrenomUser(?string $prenom_user): self
    {
        $this->prenom_user = $prenom_user;

        return $this;
    }

    /**
     * @return iterable|Issues[]
     */
    public function getIssues(): iterable
    {
        return $this->issues;
    }

    public function addIssue(Issues $issue): self
    {
        if (!$this->issues->contains($issue)) {
            $this->issues[] = $issue;
            $issue->setUserId($this);
        }

        return $this;
    }

    public function removeIssue(Issues $issue): self
    {
        if ($this->issues->contains($issue)) {
            $this->issues->removeElement($issue);
            // set the owning side to null (unless already changed)
            if ($issue->getUserId() === $this) {
                $issue->setUserId(null);
            }
        }

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
            $assocIssueNotation->setUserId($this);
        }

        return $this;
    }

    public function removeAssocIssueNotation(AssocIssueNotation $assocIssueNotation): self
    {
        if ($this->assocIssueNotations->contains($assocIssueNotation)) {
            $this->assocIssueNotations->removeElement($assocIssueNotation);
            // set the owning side to null (unless already changed)
            if ($assocIssueNotation->getUserId() === $this) {
                $assocIssueNotation->setUserId(null);
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
            $assocIssueCommentaire->setUserId($this);
        }

        return $this;
    }

    public function removeAssocIssueCommentaire(AssocIssueCommentaire $assocIssueCommentaire): self
    {
        if ($this->assocIssueCommentaires->contains($assocIssueCommentaire)) {
            $this->assocIssueCommentaires->removeElement($assocIssueCommentaire);
            // set the owning side to null (unless already changed)
            if ($assocIssueCommentaire->getUserId() === $this) {
                $assocIssueCommentaire->setUserId(null);
            }
        }

        return $this;
    }
}
