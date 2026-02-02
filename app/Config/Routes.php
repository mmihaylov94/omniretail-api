<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('v1', ['filter' => 'cors'], static function ($routes) {
    $routes->get('health', fn () => response()->setJSON(['ok' => true]));
});
