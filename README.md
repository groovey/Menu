# Menu

Groovey Menu Package


## Installation

    $ composer require groovey/menu

## Setup

```php
use Groovey\Config\Providers\MenuServiceProvider;

$app = new Application();
$app['debug'] = true;

$app->register(new MenuServiceProvider(), [
        'menu.config'    => __DIR__.'/yaml/menu.yml',
        'menu.templates' => __DIR__.'/templates/menus',
        'menu.cache'     => __DIR__.'/cache',
    ]);

print $app['menu']->render();

```


## Standalone

```php
<?php

require_once __DIR__.'/vendor/autoload.php';

use Groovey\Menu\Menu;

$menu = new Menu(
        $config    = __DIR__ . '/yaml/menu.yml',
        $templates = __DIR__ . '/templates/menus'
    );

print $menu->render();
```