<?php

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Groovey\Menu\Providers\MenuServiceProvider;

class MenuTest extends PHPUnit_Framework_TestCase
{
    private function init()
    {
        $app = new Application();
        $app['debug'] = true;

        $app->register(new TwigServiceProvider(), [
                    'twig.path' => __DIR__.'/../templates'
                ]);

        $app->register(new MenuServiceProvider(), [
                'menu.config' => __DIR__.'/../yaml/menu.yml',
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
