<?php

namespace App\Core\Interfaces;

/* Esta interfaz marca las directrices obligatorias para la clase DataBase */
interface IDataBase
{
    public function executeSQL($sql);
}
