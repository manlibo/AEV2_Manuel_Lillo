<?php
require_once("../vendor/autoload.php");
use App\Core\Request;
use App\Core\RouteCollection;
use App\Core\Dispatcher;

/* Creamos los objetos de nuestra base del proyecto para iniciar la aplicación */
$request = new Request();
$routeColection = new RouteCollection();
$dispatcher = new Dispatcher($routeColection, $request);
