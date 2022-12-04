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
    
    //########ASOCIACIÓN CON id de la tabla pedidos
    /**
     * @ORM\ManyToOne(targetEntity="OrdersEntity" inversedBy="invoices_id_orders")
     * @ORM\JoinColumn(name="id_pedido", referencedColumnName="id")
     */
    private OrdersEntity $orders_id_orders;

    /**
     * @ORM\Column(name="tipo", type="string", length="2") 
     */
    private ?DateTime $type_invoices;

    /**
     * @ORM\Column(name="valor", type="decimal", scale="10", precision="2") 
     */
    private DateTime $value_invoices;

    /**
     * Get the value of id_invoices
     *
     * @return  int
     */
    public function getIdInvoices()
    {
        return $this->id_invoices;
    }

    /**
     * Set the value of id_invoices
     *
     * @param  int  $id_invoices
     *
     * @return  self
     */
    public function setIdInvoices(int $id_invoices)
    {
        $this->id_invoices = $id_invoices;

        return $this;
    }

    /**
     * Get the value of date_invoices
     *
     * @return  DateTime
     */
    public function getDateInvoices()
    {
        return $this->date_invoices;
    }

    /**
     * Set the value of date_invoices
     *
     * @param  DateTime  $date_invoices
     *
     * @return  self
     */
    public function setDateInvoices(DateTime $date_invoices)
    {
        $this->date_invoices = $date_invoices;

        return $this;
    }

    /**
     * Get the value of orders_id_orders
     *
     * @return  OrdersEntity
     */
    public function getOrdersIdOrders()
    {
        return $this->orders_id_orders;
    }

    /**
     * Set the value of orders_id_orders
     *
     * @param  OrdersEntity  $orders_id_orders
     *
     * @return  self
     */
    public function setOrdersIdOrders(OrdersEntity $orders_id_orders)
    {
        $this->orders_id_orders = $orders_id_orders;

        return $this;
    }

    /**
     * Get the value of type_invoices
     *
     * @return  ?DateTime
     */
    public function getTypeInvoices()
    {
        return $this->type_invoices;
    }

    /**
     * Set the value of type_invoices
     *
     * @param  ?DateTime  $type_invoices
     *
     * @return  self
     */
    public function setTypeInvoices(?DateTime $type_invoices)
    {
        $this->type_invoices = $type_invoices;

        return $this;
    }

    /**
     * Get the value of value_invoices
     *
     * @return  DateTime
     */
    public function getValueInvoices()
    {
        return $this->value_invoices;
    }

    /**
     * Set the value of value_invoices
     *
     * @param  DateTime  $value_invoices
     *
     * @return  self
     */
    public function setValueInvoices(DateTime $value_invoices)
    {
        $this->value_invoices = $value_invoices;

        return $this;
    }
}
