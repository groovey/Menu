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
                'twig.path' => getcwd().'/resources/templates',
            ]);

        $app->register(new MenuServiceProvider(), [
                'menu.config' => getcwd().'/resources/yaml/menus.yml',
            ]);

        $this->app = $app;
    }

    public function testMenu()
    {
        $app = $this->app;

        $output = $app['menu']->render();
        $this->assertRegExp('/mm-dropdown/', $output);
    }
}
