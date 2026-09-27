<?php

declare(strict_types=1);

namespace Tdc\ToolboxBundle\User\Event;

use Tdc\ToolboxBundle\User\Contract\EmailUserInterface;
use Tdc\ToolboxBundle\User\Contract\VerifiableUserInterface;

final readonly class UserVerificationRequestedEvent
{
    public function __construct(
        public EmailUserInterface&VerifiableUserInterface $user,
    ) {
    }
}