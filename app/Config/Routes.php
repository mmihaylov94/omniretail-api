<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('api', ['filter' => 'cors'], static function ($routes) {
    $routes->group('v1', static function ($routes) {
        $routes->get('health', fn () => response()->setJSON(['ok' => true]));
    });
});
