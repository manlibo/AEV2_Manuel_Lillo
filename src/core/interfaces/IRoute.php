<?php

namespace App\Core\Interfaces;

/* En nuestra estructura necesitamos poner como norma que la clase
RouteCollection tenga el método getRoutes */
interface IRoute
{
    public function getRoutes();
}
