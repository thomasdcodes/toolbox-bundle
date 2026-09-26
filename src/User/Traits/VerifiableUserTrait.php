<?php

declare(strict_types=1);

namespace Tdc\ToolboxBundle\User\Traits;

use Doctrine\ORM\Mapping as ORM;

trait VerifiableUserTrait
{
    #[ORM\Column(options: ['default' => false])]
    private bool $verified = false;

    public function isVerified(): bool
    {
        return $this->verified;
    }

    public function setVerified(bool $verified): void
    {
        $this->verified = $verified;
    }
}