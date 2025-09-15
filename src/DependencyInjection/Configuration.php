<?php

$rootNode
    ->children()
    ->scalarNode('route_prefix')->defaultValue('/auth')->cannotBeEmpty()->end()
    ->end();