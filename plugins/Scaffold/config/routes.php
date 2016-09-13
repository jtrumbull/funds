<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'Scaffold',
    ['path' => '/scaffold'],
    function (RouteBuilder $routes) {
        $routes->fallbacks('DashedRoute');
    }
);
