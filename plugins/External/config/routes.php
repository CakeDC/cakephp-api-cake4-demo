<?php

use Cake\Core\Configure;
use Cake\Routing\Router;
use Cake\Routing\RouteBuilder;

Router::plugin('CakeDC/Api', ['path' => '/apiext'], function ($routes) {
    $useVersioning = Configure::read('Api.useVersioning');
    $versionPrefix = Configure::read('Api.versionPrefix');
    $middlewares = Configure::read('Api.Middleware');
    $middlewareNames = array_keys($middlewares);

    $routes->applyMiddleware(...$middlewareNames);

    $routes->connect('/**', ['plugin' => 'CakeDC/Api', 'controller' => 'Api', 'action' => 'notFound']);
});

