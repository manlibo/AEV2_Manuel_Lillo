<?php

namespace App\Controllers;

use App\Core\EntityManager;
use App\Entity\ProductsEntity;
use App\Core\AbstractController;

class ProductsController extends AbstractController
{

    //Clase para listar todos Los datos de la tabla productos.
    public function listProducts()
    {
        $entityManager = (new EntityManager())->getEntityManager();
        $produtsRepository = $entityManager->getRepository(ProductsEntity::class);
        $products = $produtsRepository->findAll();
        $this->render(
            "products.html.twig",
            ['title_head'=>'PRODUCTS',
            'results'=>$products]
        );
    }
}
