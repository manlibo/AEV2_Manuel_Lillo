<?php

namespace App\Controllers;

use App\Core\EntityManager;
use App\Entity\OrderDetailEntity;
use App\Entity\OrdersEntity;
use App\Core\AbstractController;

class OrderDetailController extends AbstractController
{

    //Clase para listar todos Los datos de la tabla productos.
    public function listDetail(int $id)
    {
        $entityManager = (new EntityManager())->getEntityManager();
        //$detailRepository = $entityManager->getRepository(OrderDetailEntity::class);
        //$detail = $detailRepository->findBy([$id]);
        $detailRepository = $entityManager->getRepository(OrderDetailEntity::class);
        $detail = $detailRepository->findBy(['id_pedido'=>$id]);
        $pedidoRepository = $entityManager->getRepository(OrdersEntity::class);
        $pedido = $pedidoRepository->find($id);
        //var_dump($pedido);
        $this->render(
            "orders.html.twig",
            ['title_head'=>'Order',
            'title_detail'=>'Details',
            'detail'=>$detail,
            'pedido'=>$pedido]
        );
    }
}


