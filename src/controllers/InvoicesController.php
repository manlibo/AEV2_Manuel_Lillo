<?php

namespace App\Controllers;

use App\Core\EntityManager;
use App\Entity\InvoicesEntity;
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
}
