<?php

declare(strict_types=1);

namespace Tdc\ToolboxBundle\User\Contract;

interface EmailUserInterface
{
    public function getEmail(): string;

    public function setEmail(string $email): void;
}