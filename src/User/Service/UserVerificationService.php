<?php

declare(strict_types=1);

namespace Tdc\ToolboxBundle\User\Service;

use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Tdc\ToolboxBundle\User\Contract\EmailUserInterface;
use Tdc\ToolboxBundle\User\Contract\VerifiableUserInterface;
use Tdc\ToolboxBundle\User\Event\UserVerificationRequestedEvent;
use Tdc\ToolboxBundle\User\Event\UserVerifiedEvent;

final readonly class UserVerificationService
{
    public function __construct(
        private EventDispatcherInterface $eventDispatcher,
    )
    {
    }

    public function requestVerification(EmailUserInterface&VerifiableUserInterface $user): void
    {
        if ($user->isVerified()) {
            return;
        }

        $this->eventDispatcher->dispatch(
            new UserVerificationRequestedEvent($user)
        );
    }

    public function verify(VerifiableUserInterface $user): void
    {
        if ($user->isVerified()) {
            return;
        }

        $user->setVerified(true);

        $this->eventDispatcher->dispatch(
            new UserVerifiedEvent($user)
        );
    }

}