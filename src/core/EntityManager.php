<?php
//clase instancia del EntityManager para conectar Doctrine y la BD

namespace App\Core;

use Doctrine\ORM\ORMSetup;
use Dotenv\Dotenv;

class EntityManager
{
    private $entityManager;
    

    public function __construct()
    {
        /* En lugar de hacer un json_decode, como el archivo que tenemos es .env y además estamos usando
        una librería que lee el archivo de configuración .env simplemente le decimos donde tenemoso 
        el archivo y lo cargamos */
        $dotenv = Dotenv::createImmutable(__DIR__.'/../../config/');
        $dotenv->load();
    
        //Guardamos la ruta donde estan ubicadas todas las entidades
        $paths = array(__DIR__.'/../entity');
        //Indicamos que estamos en modo desarrollo. Cogemos el valor de la configuración
        $isDevMode = boolval($_ENV["DEVELOP_MODE"]);
        //Cargamos en un array los datos de la conexión desde el archivo .env 
        $dbParams = array(
            'host' => $_ENV["db_server"],
            'driver' => $_ENV["db_driver"],
            'user' => $_ENV["db_user"],
            'password' => $_ENV["db_password"],
            'dbname' => $_ENV["db_name"]
        );
        //Creamos la configuración de donde y como
        $config = ORMSetup::createAnnotationMetadataConfiguration($paths,$isDevMode,null,null);
        //creamos el objeto EntityManager con la configuración que hemos definido 
        //para poder instanciarlo en esta clase.
        $this->entityManager = \Doctrine\ORM\EntityManager::create($dbParams, $config);

    }

 


    /**
     * Get the value of entityManager
     */ 
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * Set the value of entityManager
     *
     * @return  self
     */ 
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;

        return $this;
    } 
}

