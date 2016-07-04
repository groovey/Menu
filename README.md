# Config

A Silex 2 service provider that uses the Laravel's config component.


## Installation

    $ composer require groovey/menu

## Setup

```php
use Groovey\Config\Providers\MenuServiceProvider;

$app = new Application();
$app['debug'] = true;

$app->register(new MenuServiceProvider(), [
            'menu.path'        => __DIR__.'/config',
            'menu.environment' => 'LOCALHOST',
        ]);

```



