<?php

namespace Tdc\ToolboxBundle\Contracts;

use Symfony\Component\Security\Core\User\UserInterface;

interface ToolboxUserInterface extends UserInterface
{
    public function getEmail(): string;
}