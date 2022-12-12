<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;



class ErrorController extends AbstractController
{



    
    public function main()
    {

        $this->render("error.html.twig", [
            "title_head" => "La ruta no es correcta",
            
        ]);
    }
}
