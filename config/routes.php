<?php
use App\Controller\ShoutController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {
    $routes->add('test_api', '/shout/{name}')
        ->controller([ShoutController::class, 'getShout'])
        ->methods(['GET'])
        ->requirements(['name']);
};