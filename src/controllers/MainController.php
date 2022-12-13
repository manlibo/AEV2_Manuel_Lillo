<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;

class MainController extends AbstractController
{

    /* Esta ruta es el inicio de nuestra aplicación,
    aquí renderizamos la primera plantilla gracias a la extensión de AbstractController
    */
    public $pagAnterior;
    
    public function main()
    {
        $this->render("main.html.twig", [
            "title_head" => "MVC con Doctrine",
            "home" => "Corporation",
            "home_title" => "Welcome to our Corporation",
            "sidebar_title" => "Our sections"
        ]);
    }
}
