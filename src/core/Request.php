<?php

namespace App\Core;

use App\Core\Interfaces\IRequest;

class Request implements IRequest
{
    private $route;
    private $params;

    public function __construct()
    {
        /* Necesitamos obtener la ruta del navegador */
        $rawRoute = $_SERVER["REQUEST_URI"];
        /* Una vez obtenida la ruta la dividimos en partes a partir de cada / */
        $rawRouteElements = explode("/", $rawRoute);
        $this->route = "/" . $rawRouteElements[1];
        $this->params = array_slice($rawRouteElements, 2);
    }
    

    /**
     * Get the value of route
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Get the value of params
     */
    public function getParams()
    {
        return $this->params;
    }
}
