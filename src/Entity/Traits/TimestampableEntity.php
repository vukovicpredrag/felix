<?php
declare(strict_types=1);
namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use \DateTime;
use Exception;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Serializer\Attribute\Groups;

/**
 * Class TimestampableEntity
 */
trait TimestampableEntity
{
    /**
     * Time of entity creation
     *
     * @var DateTime $createdAt
     */
    #[ORM\Column(type:"datetime", nullable:true)]
    #[Groups(['Notification:view'])]
    private DateTime $createdAt;

    /**
     * Time on entity last update
     *
     * @var DateTime $updatedAt
     */
    #[ORM\Column(type:"datetime", nullable:true)]
    #[Ignore]
    private DateTime $updatedAt;

    /**
     * Get createdAt
     *
     * @return DateTime|null
     */
    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    /**
     * Set createdAt
     *
     * @param DateTime $createdAt
     *
     * @return $this
     */
    public function setCreatedAt(DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return DateTime|null
     */
    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Set updatedAt
     *
     * @param DateTime $updatedAt
     *
     * @return $this
     */
    public function setUpdatedAt(\DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Set created timestamp on entity creation in DB
     */
    #[ORM\PrePersist]
    public function createTimestamps(): void
    {
        $this->setCreatedAt(new DateTime('now'));
    }

    /**
     * Set updated timestamp on entity update in DB
     */
    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function updateTimestamps(): void
    {
        $this->setUpdatedAt(new DateTime('now'));
    }


}
