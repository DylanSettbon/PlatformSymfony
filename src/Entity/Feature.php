<?php

namespace App\Entity;

use App\Traits\TimestampableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FeatureRepository")
 */
class Feature
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
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $requested;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="features")
     */
    private $applicant;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Advancement", mappedBy="feature")
     */
    private $advancements;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Note", mappedBy="Feature")
     */
    private $notes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Comment", mappedBy="features")
     */
    private $comments;

    public function __construct()
    {
        $this->advancements = new ArrayCollection();
        $this->notes = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getRequested(): ?int
    {
        return $this->requested;
    }

    public function setRequested(int $requested): self
    {
        $this->requested = $requested;

        return $this;
    }

    public function getApplicant(): ?User
    {
        return $this->applicant;
    }

    public function setApplicant(?User $applicant): self
    {
        $this->applicant = $applicant;

        return $this;
    }

    /**
     * @return Collection|Advancement[]
     */
    public function getAdvancements(): Collection
    {
        return $this->advancements;
    }

    public function addAdvancement(Advancement $advancement): self
    {
        if (!$this->advancements->contains($advancement)) {
            $this->advancements[] = $advancement;
            $advancement->setFeature($this);
        }

        return $this;
    }

    public function removeAdvancement(Advancement $advancement): self
    {
        if ($this->advancements->contains($advancement)) {
            $this->advancements->removeElement($advancement);
            // set the owning side to null (unless already changed)
            if ($advancement->getFeature() === $this) {
                $advancement->setFeature(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Note[]
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Note $note): self
    {
        if (!$this->notes->contains($note)) {
            $this->notes[] = $note;
            $note->setFeature($this);
        }

        return $this;
    }

    public function removeNote(Note $note): self
    {
        if ($this->notes->contains($note)) {
            $this->notes->removeElement($note);
            // set the owning side to null (unless already changed)
            if ($note->getFeature() === $this) {
                $note->setFeature(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->addFeature($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            $comment->removeFeature($this);
        }

        return $this;
    }
}
