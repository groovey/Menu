<?php

use Silex\Application;
use Groovey\Menu\Providers\MenuServiceProvider;

class MenuTest extends PHPUnit_Framework_TestCase
{
    private function init()
    {
        $app = new Application();
        $app['debug'] = true;

        $app->register(new MenuServiceProvider(), [
                'menu.config'    => __DIR__.'/../yaml/menu.yml',
                'menu.templates' => __DIR__.'/../templates/menus',
                'menu.cache'     => __DIR__.'/../cache',
            ]);

        return $app;
    }

    public function testMenu()
    {
        $app = $this->init();

        $output = $app['menu']->render();
        $this->assertRegExp('/mm-dropdown/', $output);
    }
}
