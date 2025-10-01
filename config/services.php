<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Tdc\ToolboxBundle\Service\VersionService;

return static function (ContainerConfigurator $container): void {

    $container->services()
        ->set('tdc.toolbox.version_service', VersionService::class)
        ->args(['%kernel.project_dir%'])
        ->alias(VersionService::class, 'tdc.toolbox.version_service');

    $container->services()->load('Tdc\\ToolboxBundle\Controller\\', '../src/Controller')
        ->tag('controller.service_arguments')
        ->autowire()
        ->autoconfigure()
        ->public();
};