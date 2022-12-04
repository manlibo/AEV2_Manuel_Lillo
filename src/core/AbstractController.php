<?php

namespace App\Core;

//extensión para el formato de moneda
use Twig\Extra\Intl\IntlExtension;

abstract class AbstractController
{
    public $twig;

    /* Este constructor permitirá cargar el loader de twig a todas las clases que hereden de ésta. */
    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__."/../templates");
        $this->twig = new \Twig\Environment($loader);

        /* Extensión para formato de moneda */
        $this->twig->addExtension(new IntlExtension());
        
        $this->twig->addGlobal('server_name', $_SERVER['SERVER_NAME']);
        $this->twig->addGlobal("paginaAnterior", "");
    }

    /* Este método se encarga de renderizar las plantillas que hemos creado de twig */
    public function render($template, $params)
    {
        $template = $this->twig->load($template);
        echo $template->render($params);
    }
}
