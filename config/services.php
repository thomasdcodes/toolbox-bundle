<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container): void {

    $container->services()
        ->set('tdc.mein_klassenname', FQCI)
        ->args([])
        ->alias(FQCI, 'tdc.mein_klassenname')
    ;

};