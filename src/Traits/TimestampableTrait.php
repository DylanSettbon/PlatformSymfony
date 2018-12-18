<?php
/**
 * Created by PhpStorm.
 * User: jeromebueno
 * Date: 28/11/2018
 * Time: 18:27
 */

namespace App\Traits;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


trait TimestampableTrait
{
    /**
     * @var string $createdBy
     *
     * @Gedmo\Blameable(on="create")
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     */
    private $createdBy;

    /**
     * @var string $updatedBy
     *
     * @Gedmo\Blameable(on="update")
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(name="updated_by", referencedColumnName="id")
     */
    private $updatedBy;

    /**
     * @var \DateTime $createdAt
     * @ORM\Column(type="datetime", options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt;

    /**
     * @var \DateTime $updatedAt
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    public function __construct()
    {
        $this->updatedAt = new \DateTime();
        $this->createdAt = new \DateTime();
    }

    /**
     * @return string
     */
    public function getCreatedBy(): string
    {
        return $this->createdBy;
    }

    /**
     * @param string $createdBy
     */
    public function setCreatedBy(string $createdBy): void
    {
        $this->createdBy = $createdBy;
    }

    /**
     * @return string
     */
    public function getUpdatedBy(): string
    {
        return $this->updatedBy;
    }

    /**
     * @param string $updatedBy
     */
    public function setUpdatedBy(string $updatedBy): void
    {
        $this->updatedBy = $updatedBy;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}