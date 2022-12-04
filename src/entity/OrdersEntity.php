<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\OrdersRepository;
use DateTime;

/**
 * @ORM\Entity(RepositoryClass=OrdersRepository::class)
 * @ORM\Table(name="pedidos")
 */
class OrdersEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id", type="integer")
     */
    private int $id_orders;

    /**
    * @ORM\Column(name="tipo", type="string", length="1")
    */
    private string $type_orders;

    /**
    * @ORM\Column(name="fecha", type="date")
    */
    private DateTime $date_orders;

    /**
    * @ORM\Column(name="observacion", type="string", length="255")
    */
    private ?string $obs_order;

    //########ASOCIACIÓN CON id de la tabla empresas
    /**
     * @ORM\ManyToOne(targetEntity="BusinessEntity" inversedBy="orders_id_business")
     * @ORM\JoinColumn(name="id_empresa", referencedColumnName="id")
     */
    private BusinessEntity $business_id_business;

    /**
     * Get the value of id_orders
     *
     * @return  int
     */
    public function getIdOrders()
    {
        return $this->id_orders;
    }

    /**
     * Set the value of id_orders
     *
     * @param  int  $id_orders
     *
     * @return  self
     */
    public function setIdOrders(int $id_orders)
    {
        $this->id_orders = $id_orders;

        return $this;
    }

    /**
     * Get the value of type_orders
     *
     * @return  string
     */
    public function getTypeOrders()
    {
        return $this->type_orders;
    }

    /**
     * Set the value of type_orders
     *
     * @param  string  $type_orders
     *
     * @return  self
     */
    public function setTypeOrders(string $type_orders)
    {
        $this->type_orders = $type_orders;

        return $this;
    }

    /**
     * Get the value of date_orders
     *
     * @return  DateTime
     */
    public function getDateOrders()
    {
        return $this->date_orders;
    }

    /**
     * Set the value of date_orders
     *
     * @param  DateTime  $date_orders
     *
     * @return  self
     */
    public function setDateOrders(DateTime $date_orders)
    {
        $this->date_orders = $date_orders;

        return $this;
    }

    /**
     * Get the value of obs_order
     *
     * @return  ?string
     */
    public function getObsOrder()
    {
        return $this->obs_order;
    }

    /**
     * Set the value of obs_order
     *
     * @param  ?string  $obs_order
     *
     * @return  self
     */
    public function setObsOrder(?string $obs_order)
    {
        $this->obs_order = $obs_order;

        return $this;
    }

    /**
     * Get the value of business_id_business
     *
     * @return  BusinessEntity
     */
    public function getBusinessIdBusiness()
    {
        return $this->business_id_business;
    }

    /**
     * Set the value of business_id_business
     *
     * @param  BusinessEntity  $business_id_business
     *
     * @return  self
     */
    public function setBusinessIdBusiness(BusinessEntity $business_id_business)
    {
        $this->business_id_business = $business_id_business;

        return $this;
    }
}
