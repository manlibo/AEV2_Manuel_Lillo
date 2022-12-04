<?php

namespace App\Core\Interfaces;

/* Esta interfaz marca las directrices obligatorias para la clase Request */
interface IRequest
{
    public function getRoute();
    public function getParams();
}
