<?php

namespace Groovey\Menu;

use Symfony\Component\Yaml\Yaml;

class Menu
{
    private $html;
    private $twig;
    private $yaml;

    public function __construct($config, $templates, $cachePath = '')
    {
        $yaml   = Yaml::parse(file_get_contents($config));
        $cache  = ($cachePath) ? ['cache' => $cachePath] : [];

        $loader = new \Twig_Loader_Filesystem($templates);
        $twig   = new \Twig_Environment($loader, $cache);

        $this->twig = $twig;
        $this->yaml = $yaml;

        $this->make();
    }

    public function make()
    {
        $twig = $this->twig;
        $html = $this->html;

        foreach ($this->yaml as $menu) {
            if (!isset($menu['submenu'])) {
                $html .= $twig->render('parent.html', [
                        'title' => $menu['title'],
                        'url'   => $menu['url'],
                        'icon'  => $menu['icon'],
                    ]);
            } else {
                $html .= $twig->render('child.html', [
                        'title'   => $menu['title'],
                        'icon'    => $menu['icon'],
                        'submenu' => $menu['submenu'],
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
