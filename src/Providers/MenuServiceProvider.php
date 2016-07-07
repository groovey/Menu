<?php

namespace Groovey\Menu\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Silex\Application;
use Silex\Api\BootableProviderInterface;
use Groovey\Menu\Menu;

class MenuServiceProvider implements ServiceProviderInterface, BootableProviderInterface
{
    public function register(Container $app)
    {
        $app['menu'] = function ($app) {

            $config = $app['menu.config'];

            return new Menu($app, $config);
        };
    }

    public function boot(Application $app)
    {
    }
}
