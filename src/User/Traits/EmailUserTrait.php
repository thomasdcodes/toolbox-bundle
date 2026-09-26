<?php

declare(strict_types=1);

namespace Tdc\ToolboxBundle\User\Traits;

use Doctrine\ORM\Mapping as ORM;

trait EmailUserTrait
{
    #[ORM\Column(length: 180, unique: true)]
    private string $email;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = mb_strtolower(trim($email));
    }
}