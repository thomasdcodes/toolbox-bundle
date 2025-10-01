<?php

declare(strict_types=1);

namespace Tdc\ToolboxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Tdc\ToolboxBundle\Service\VersionService;

class VersionController extends AbstractController
{
    public function changes(VersionService $versionService): Response
    {
        try {
            $changelog = $versionService->getChangelog();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
        }

        return $this->render('@TdcToolbox/version/changes.html.twig', [
            'changelog' => $changelog ?? null,
            'error' => $errorMessage ?? null,
        ]);
    }
}