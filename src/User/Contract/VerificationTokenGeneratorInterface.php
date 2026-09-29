<?php

declare(strict_types=1);

namespace Tdc\ToolboxBundle\User\Contract;

interface VerificationTokenGeneratorInterface
{
    public function generate(EmailUserInterface $user): string;
}