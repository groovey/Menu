<?php

namespace Groovey\Menu;

use Pimple\Container;
use Symfony\Component\Yaml\Yaml;

class Menu
{
    private $html;
    private $app;
    private $yaml;

    public function __construct(Container $app, $config)
    {
        $yaml = Yaml::parse(file_get_contents($config));
        $this->app = $app;
        $this->yaml = $yaml;

        $this->make();
    }

    public function make()
    {
        $app = $this->app;
        $html = $this->html;

        foreach ($this->yaml as $menu) {
            if (!isset($menu['submenu'])) {
                $html .= $app['twig']->render('menus/parent.html', [
                                'title'  => coalesce($menu['title']),
                                'url'    => coalesce($menu['url']),
                                'icon'   => coalesce($menu['icon']),
                                'status' => coalesce($menu['status']),
                            ]);
            } else {
                $html .= $app['twig']->render('menus/child.html', [
                                        'title'   => coalesce($menu['title']),
                                        'icon'    => coalesce($menu['icon']),
                                        'status'  => coalesce($menu['status']),
                                        'submenu' => coalesce($menu['submenu']),
                                    ]);
            }
        }

        $this->html = $html;
    }

    public function render()
    {
        return $this->html;
    }
}
