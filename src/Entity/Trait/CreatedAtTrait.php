<?php

namespace Tdc\ToolboxBundle\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

/**
 * This trait provides an easy to use CreatedAt field for an entity.
 * To get this trait working, you have to add the "HasLifecycleCallbacks" attribute onto your entity.
 */
trait CreatedAtTrait
{
    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    #[ORM\PrePersist]
    public function initCreatedAt(): void
    {
        $this->setCreatedAt(new \DateTimeImmutable());
    }
}