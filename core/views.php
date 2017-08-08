<?php

Class View
{

    protected $loader;
    protected $twig;

    public function __construct()
    {
        $this->loader = new Twig_Loader_Filesystem('views');
        $this->twig = new Twig_Environment($this->loader, [
//          'cache' => 'templates_c',
            'cache' => false
        ]);
    }

    public function render($fileName, $data = null)
    {
        echo $this->twig->render($fileName . '.html', $data);
    }

}