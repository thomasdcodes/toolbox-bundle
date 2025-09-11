<?php

namespace Tdc\ToolboxBundle\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

/**
 * This trait provides an easy to use UpdatedAt field for an entity.
 * To get this trait working, you have to add the "HasLifecycleCallbacks" attribute onto your entity.
 */
trait UpdatedAtTrait
{
    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updated_at = null;

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    #[ORM\PreUpdate]
    public function initUpdatedAt(): void
    {
        $this->setUpdatedAt(new \DateTimeImmutable());
    }

}