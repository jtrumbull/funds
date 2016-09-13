<?php
/*
 |------------------------------------------------------------------------------
 | Config: Routes
 |------------------------------------------------------------------------------
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
  
  // Static pages
  $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'index']);
  $routes->connect('/about', ['controller' => 'Pages', 'action' => 'display', 'about']);
  $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
  
  // Admin
  $routes->connect('/register', ['controller' => 'Users', 'action' => 'create']);
  $routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);
  $routes->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);
  $routes->connect('/profile', ['controller' => 'Users', 'action' => 'read']);
  
  $routes->connect(
    '/:controller/:id',
    ['action' => 'read'],
    ['id' => '[0-9]+', 'routeClass' => DashedRoute::class, 'pass' => ['id']]
  );
  
  $routes->fallbacks('DashedRoute');
  
});

Router::prefix('api', ['_namePrefix' => 'api:', '_ext' => 'json'], function ($routes) {
  
  $routes->extensions(['json', 'xml']);
  
  $routes->connect(
    '/:controller/:id',
    ['action' => 'read'],
    ['id' => '[0-9]+', 'routeClass' => DashedRoute::class, 'pass' => ['id']]
  );
  
  $routes->fallbacks('DashedRoute');
  
});

Plugin::routes();
