<?php
namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Helpers\ShoutHelper;
use App\Interfaces\Helpers\ShoutHelperInterface;
use App\Interfaces\Repositories\ShoutRepositoryInterface;
use App\Interfaces\Services\ShoutServiceInterface;
use App\Repositories\ShoutRepository;
use App\Services\ShoutService;

return function(ContainerConfigurator $configurator) {
    // default configuration for services in *this* file
    $services = $configurator->services()
        ->defaults()
            ->autowire()      // Automatically injects dependencies in your services.
            ->autoconfigure() // Automatically registers your services as commands, event subscribers, etc.
    ;

    $services->load('App\\', '../src/*')
        ->exclude('../src/{DependencyInjection,Entity,Migrations,Tests,Kernel.php}');

    $services->alias(ShoutServiceInterface::class, ShoutService::class);
    $services->alias(ShoutHelperInterface::class, ShoutHelper::class);
    $services->alias(ShoutRepositoryInterface::class, ShoutRepository::class);
};