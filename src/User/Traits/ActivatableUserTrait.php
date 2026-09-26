<?php

declare(strict_types=1);

namespace Tdc\ToolboxBundle\User\Traits;

use Doctrine\ORM\Mapping as ORM;

trait ActivatableUserTrait
{
    #[ORM\Column(options: ['default' => true])]
    private bool $active = true;

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }
}