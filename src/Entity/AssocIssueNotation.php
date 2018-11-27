<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AssocIssueNotationRepository")
 */
class AssocIssueNotation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $note;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_notation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UsersAccount", inversedBy="assocIssueNotations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Issues", inversedBy="assocIssueNotations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $issueId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getDateNotation(): ?\DateTimeInterface
    {
        return $this->date_notation;
    }

    public function setDateNotation(?\DateTimeInterface $date_notation): self
    {
        $this->date_notation = $date_notation;

        return $this;
    }

    public function getUserId(): ?UsersAccount
    {
        return $this->userId;
    }

    public function setUserId(?UsersAccount $userId): self
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
