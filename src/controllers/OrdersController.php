<?php

namespace App\Controllers;

use App\Core\EntityManager;
use App\Entity\OrdersEntity;
use App\Core\AbstractController;

class OrdersController extends AbstractController
{

    //Clase para listar todos Los datos de la tabla pedidos.
    public function listOrders()
    {
        $entityManager = (new EntityManager())->getEntityManager();
        $ordersRepository = $entityManager->getRepository(OrdersEntity::class);
        $orders = $ordersRepository->findAll();
        $this->render(
            "orders.html.twig",
            ['title_head'=>'ORDERS',
            'orders'=>$orders]
        );
    }
}
