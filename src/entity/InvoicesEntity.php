<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\InvoicesRepository;
use DateTime;

/**
 * @ORM\Entity(repositoryClass=InvoicesRepository::class)
 * @ORM\Table(name="facturas") 
 */ 
class InvoicesEntity{
    
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(name="id_factura", type="integer")
    */
    private int $id_factura;

    /**
    * @ORM\Column(name="fecha", type="date")
    */
    private DateTime $fecha;

    /**
    * @ORM\Column(name="id_pedido", type="integer")
    */
    private int $id_pedido;

    /**
    * @ORM\Column(name="tipo", type="string", length=2, nullable="true")
    */
    private ?string $tipo;

    /**
     * @ORM\Column(name="valor", type="decimal", precision=10, scale=2)
     */
    private float $precioUnidad;

    /**
     * Many facturas has One pedido
     * @ORM\ManyToOne(targetEntity="OrdersEntity", inversedBy="facturas")
     * @ORM\JoinColumn(name="id_pedido", referencedColumnName="id")
     */
    private OrdersEntity $pedido;
    

    /**
     * Get the value of id_factura
     *
     * @return  int
     */
    public function getIdFactura()
    {
        return $this->id_factura;
    }

    /**
     * Set the value of id_factura
     *
     * @param  int  $id_factura
     *
     * @return  self
     */
    public function setIdFactura(int $id_factura)
    {
        $this->id_factura = $id_factura;

        return $this;
    }

    /**
     * Get the value of fecha
     *
     * @return  DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @param  DateTime  $fecha
     *
     * @return  self
     */
    public function setFecha(DateTime $fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of id_pedido
     *
     * @return  int
     */
    public function getIdPedido()
    {
        return $this->id_pedido;
    }

    /**
     * Set the value of id_pedido
     *
     * @param  int  $id_pedido
     *
     * @return  self
     */
    public function setIdPedido(int $id_pedido)
    {
        $this->id_pedido = $id_pedido;

        return $this;
    }

    /**
     * Get the value of tipo
     *
     * @return  ?string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @param  ?string  $tipo
     *
     * @return  self
     */
    public function setTipo(?string $tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of precioUnidad
     *
     * @return  float
     */
    public function getPrecioUnidad()
    {
        return $this->precioUnidad;
    }

    /**
     * Set the value of precioUnidad
     *
     * @param  float  $precioUnidad
     *
     * @return  self
     */
    public function setPrecioUnidad(float $precioUnidad)
    {
        $this->precioUnidad = $precioUnidad;

        return $this;
    }

    /**
     * Get many facturas has One pedido
     *
     * @return  OrdersEntity
     */
    public function getPedido()
    {
        return $this->pedido;
    }

    /**
     * Set many facturas has One pedido
     *
     * @param  OrdersEntity  $pedido  Many facturas has One pedido
     *
     * @return  self
     */
    public function setPedido(OrdersEntity $pedido)
    {
        $this->pedido = $pedido;

        return $this;
    }
}