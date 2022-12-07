<?php

namespace App\Controllers;

use App\Core\EntityManager;
use App\Entity\BusinessEntity;
use App\Core\AbstractController;

class BusinessController extends AbstractController
{

    //Clase para listar todos Los datos de la tabla productos.
    public function listBusiness()
    {
        $entityManager = (new EntityManager())->getEntityManager();
        $businessRepository = $entityManager->getRepository(ProductsEntity::class);
        $business = $businessRepository->findAll();
        $this->render(
            "products.html.twig",
            ['title_head'=>'Business',
            'results'=>$business]
        );
    }
}
