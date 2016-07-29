<?php

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Groovey\Menu\Providers\MenuServiceProvider;

class MenuTest extends PHPUnit_Framework_TestCase
{
    public $app;

    public function setUp()
    {
        $app = new Application();
        $app['debug'] = true;

        $app->register(new TwigServiceProvider(), [
                    'twig.path' => __DIR__.'/../templates'
                ]);

        $app->register(new MenuServiceProvider(), [
                'menu.config' => __DIR__.'/../yaml/menu.yml',
            ]);

        $this->app = $app;
    }

    public function testMenu()
    {
        $app = $this->app();

        $output = $app['menu']->render();
        $this->assertRegExp('/mm-dropdown/', $output);
    }
}
