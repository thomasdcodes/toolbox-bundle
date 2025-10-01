<?php

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;
use Tdc\ToolboxBundle\Controller\VersionController;

return function (RoutingConfigurator $routes) {

    $routes->add('tdv.toolbox.version', '/changes')
        ->controller([VersionController::class, 'changes']);
};