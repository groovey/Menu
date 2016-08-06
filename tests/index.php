<?php

require_once __DIR__.'/../vendor/autoload.php';

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Groovey\Menu\Providers\MenuServiceProvider;

$app = new Application();
$app['debug'] = true;

$app->register(new TwigServiceProvider(), [
        'twig.path' => __DIR__.'/../resources/templates',
    ]);

$app->register(new MenuServiceProvider(), [
        'menu.config' => __DIR__.'/../resources/yaml/menus.yml',
    ]);

echo $app['menu']->render();
