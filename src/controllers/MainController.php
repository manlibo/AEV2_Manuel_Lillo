<?php

namespace App\Controllers;

use App\Core\AbstractController;

class MainController extends AbstractController
{

    /* Esta ruta es el inicio de nuestra aplicación,
    aquí renderizamos la primera plantilla gracias a la extensión de AbstractController
    */
    public $pagAnterior;
    
    public function main()
    {

        $this->render("main.html.twig", [
            "title" => "Crear un MVC",
        ]);
    }
}
