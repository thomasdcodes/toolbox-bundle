<?php

namespace Tdc\ToolboxBundle\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

/**
 * To prevent id guessing, you can use this identifier to link your entities in your app. The relation runs with the
 * primary keys as a normal auto increment int.
 * To get this trait working, you have to add the "HasLifecycleCallbacks" attribute onto your entity.
 */
trait HashedIdentifierTrait
{
    #[ORM\Column(type: 'uuid', unique: true)]
    private ?Uuid $identifier = null;

    public function getIdentifier(): ?Uuid
    {
        return $this->identifier;
    }

    public function setIdentifier(Uuid $identifier): static
    {
        $this->identifier = $identifier;

        return $this;
    }

    #[ORM\PrePersist]
    public function initIdentifier(): void
    {
        $this->setIdentifier(Uuid::v4());
    }

}