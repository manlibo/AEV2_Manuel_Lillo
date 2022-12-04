<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\InvoicesRepository;
use DateTime;

/**
 * @ORM\Entity(RepositoryClass=InvoicesRepository::class)
 * @ORM\Table(name="facturas") 
 */ 
class InvoicesEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id_factura, type="integer")
     */
    private int $id_invoices;

    /**
     * @ORM\Column(name="fecha", type="date") 
     */
    private DateTime $date_invoices;
    
    /** 
     * @ORM\
    */
}
