<?php

declare(strict_types=1);

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;
use Tdc\ToolboxBundle\Controller\VersionController;

return function (RoutingConfigurator $routes) {

    $routes->add('tdc_toolbox_version', '/changes')
        ->controller([VersionController::class, 'changes']);
};