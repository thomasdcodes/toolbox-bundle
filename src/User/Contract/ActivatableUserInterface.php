<?php

declare(strict_types=1);

namespace Tdc\ToolboxBundle\User\Contract;

interface ActivatableUserInterface
{
    public function isActive(): bool;

    public function setActive(bool $active): void;
}