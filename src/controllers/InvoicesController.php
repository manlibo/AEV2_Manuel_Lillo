<?php

namespace App\Controllers;

use App\Core\EntityManager;
use App\Entity\InvoicesEntity;
use App\Entity\OrdersEntity;
use App\Core\AbstractController;

class InvoicesController extends AbstractController
{

    //Clase para listar todos Los datos de la tabla facturas.
    public function listInvoices()
    {
        $entityManager = (new EntityManager())->getEntityManager();
        $invoicesRepository = $entityManager->getRepository(InvoicesEntity::class);
        $invoices = $invoicesRepository->findAll();
        $this->render(
            "orders.html.twig",
            ['title_head'=>'INVOICES',
            'invoices'=>$invoices]
        );
    }

    //Clase para mostrar facturas asociadas al pedido
    public function showInvoice($id)
    {
        $entityManager = (new EntityManager())->getEntityManager();
        $orderRepository = $entityManager->getRepository(OrdersEntity::class);
        $order = $orderRepository->find($id);
        $invoicesRepository = $entityManager->getRepository(InvoicesEntity::class);
        $invoices = $invoicesRepository->findBy(['id_pedido'=>$id]);
        //var_dump($invoices);
        $this->render(
            "orders.html.twig",
            ['title_head'=>'Order',
            'title_invoice'=>'Invoices',
            'order_inv'=>$order,
            'invoices_ord'=>$invoices]
        );
    }
}
