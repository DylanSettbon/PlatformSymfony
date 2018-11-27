<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NoteRepository")
 */
class Note
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="notes")
     */
    private $rater;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Feature", inversedBy="notes")
     */
    private $Feature;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getRater(): ?User
    {
        return $this->rater;
    }

    public function setRater(?User $rater): self
    {
        $this->rater = $rater;

        return $this;
    }

    public function getFeature(): ?Feature
    {
        return $this->Feature;
    }

    public function setFeature(?Feature $Feature): self
    {
        $this->Feature = $Feature;

        return $this;
    }
}
