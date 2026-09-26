<?php

declare(strict_types=1);

namespace Tdc\ToolboxBundle\User\Event;

use Tdc\ToolboxBundle\User\Contract\VerifiableUserInterface;

final readonly class UserVerifiedEvent
{
    public function __construct(
        public VerifiableUserInterface $user,
    ) {
    }
}