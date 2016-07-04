<?php

require_once __DIR__.'/vendor/autoload.php';

use Groovey\Menu\Menu;

$menu = new Menu(
        $config    = __DIR__ . '/yaml/menu.yml',
        $templates = __DIR__ . '/templates/menus'
    );

print $menu->render();