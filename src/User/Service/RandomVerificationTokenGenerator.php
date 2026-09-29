<?php

declare(strict_types=1);

namespace Tdc\ToolboxBundle\User\Service;

use Tdc\ToolboxBundle\User\Contract\EmailUserInterface;
use Tdc\ToolboxBundle\User\Contract\VerificationTokenGeneratorInterface;

class RandomVerificationTokenGenerator implements VerificationTokenGeneratorInterface
{
    public function generate(EmailUserInterface $user): string
    {
        return bin2hex(random_bytes(32));
    }
}