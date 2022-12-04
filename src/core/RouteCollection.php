<?php

namespace App\Core;

use App\Core\Interfaces\IRoute;

/* Esta clase se encarga de obtener las rutas que ofrece la aplicación */
class RouteCollection implements IRoute
{
    private $routes;

    /* Pasamos a la variable $routes todas las rutas que tiene el archivo routes.json que
    son todas las rutas que ofrece la aplicación */
    public function __construct()
    {
        $this->routes = json_decode(file_get_contents(__DIR__."/../../config/routes.json"), true);
    }

    /**
     * Get the value of routes
     */
    public function getRoutes()
    {
        return $this->routes;
    }
}
