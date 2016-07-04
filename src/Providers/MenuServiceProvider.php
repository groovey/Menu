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
            $path   = $app['menu.path'];
            $cache  = (isset($app['menu.cache'])) ? $app['menu.cache'] : '';

            return new Menu($config, $path, $cache);
        };
    }

    public function boot(Application $app)
    {
    }
}
