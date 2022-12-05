<?php

namespace App\Controllers;

use App\Core\EntityManager;
use App\Entity\WarehousesEntity;
use App\Core\AbstractController;

class WarehousesController extends AbstractController
{

    //Clase para listar todos Los datos de la tabla productos.
    public function listWarehouses()
    {
        $entityManager = (new EntityManager())->getEntityManager();
        $warehousesRepository = $entityManager->getRepository(WarehousesEntity::class);
        $warehouses = $warehousesRepository->findAll();
        $this->render(
            "products.html.twig",
            ['title_head'=>'PRODUCTS',
            'results'=>$warehouses]
        );
    }
}
