<?php

namespace App\Core;

use App\Core\Interfaces\IRequest;
use App\Core\Interfaces\IRoute;
//use App\Entity\Error;

class Dispatcher
{
    private $routeList;
    private IRequest $currentRequest;

    /* Debemos pasar la ruta del navegador(petición del usuario) y todas las rutas de la aplicación para
    que dis */

    public function __construct(IRoute $routeCollection, IRequest $request)
    {
        $this->routeList = $routeCollection->getRoutes();
        $this->currentRequest =  $request;
        $this->dispatch();
    }

    /* Esta función se encarga de enviar la acción al controlador necesario para
    realizar correctamente la acción pedida por el usuario */
    private function dispatch()
    {
        //Verificamos que la ruta que hemos recibido esta dentro de las rutas de la aplicación
        if (isset($this->routeList[$this->currentRequest->getRoute()])) {
            $controllerClass = "App\\Controllers\\".$this->routeList[$this->currentRequest->getRoute()]["controller"];
            //Creamos un nuevo controlador mediante el contenido del nombre del controlador en la variable
            $controller = new $controllerClass();
            $action = $this->routeList[$this->currentRequest->getRoute()]["action"];
            //lanzamos la acción que vamos a realizar del controlador pertinenTe
            $controller->$action(...$this->currentRequest->getParams());
        } else {
            echo "La ruta no esta definida.";
        
        }
        
        /* else {
            //En el caso que la ruta que solicitamos no este definida en la lista de rutas de la aplicación
            $error = new Error();
            $error->render(
                "error.html.twig",
                [
                "title" => "La petición no se ha procesado correctamente. Vuelve a realizar una petición",
            ]
            );
        } */
    
    }

}