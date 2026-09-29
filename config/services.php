<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Tdc\ToolboxBundle\Service\VersionService;
use Tdc\ToolboxBundle\User\Contract\VerificationTokenGeneratorInterface;
use Tdc\ToolboxBundle\User\Service\RandomVerificationTokenGenerator;
use Tdc\ToolboxBundle\User\Service\UserVerificationService;

return static function (ContainerConfigurator $container): void {

    $services = $container->services();

    $services
        ->set('tdc.toolbox.version_service', VersionService::class)
        ->autowire()
        ->args(['%kernel.project_dir%'])
        ->alias(VersionService::class, 'tdc.toolbox.version_service');

    $services
        ->load('Tdc\\ToolboxBundle\Controller\\', '../src/Controller')
        ->tag('controller.service_arguments')
        ->autowire()
        ->autoconfigure();

    $services
        ->set(UserVerificationService::class)
        ->autowire()
        ->autoconfigure();

    $services
        ->set(RandomVerificationTokenGenerator::class);

    $services
        ->alias(
            VerificationTokenGeneratorInterface::class,
            RandomVerificationTokenGenerator::class
        );
};