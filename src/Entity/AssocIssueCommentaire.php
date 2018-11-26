<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AssocIssueCommentaireRepository")
 */
class AssocIssueCommentaire
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
    private $commentaire;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_commentaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users", inversedBy="assocIssueCommentaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Issues", inversedBy="assocIssueCommentaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $issueId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getDateCommentaire(): ?\DateTimeInterface
    {
        return $this->date_commentaire;
    }

    public function setDateCommentaire(?\DateTimeInterface $date_commentaire): self
    {
        $this->date_commentaire = $date_commentaire;

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

    public function getIssueId(): ?Issues
    {
        return $this->issueId;
    }

    public function setIssueId(?Issues $issueId): self
    {
        $this->issueId = $issueId;

        return $this;
    }
}
