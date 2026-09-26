<?php

namespace Tdc\ToolboxBundle\User\Contract;

interface VerifiableUserInterface
{
    public function isVerified(): bool;

    public function setVerified(bool $verified): void;
}