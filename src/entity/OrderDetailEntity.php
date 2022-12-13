<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\OrderDetailRepository;

/**
 * @ORM\Entity(repositoryClass=OrderDetailRepository::class)
 * @ORM\Table(name="lineaspedidos")
 */
class OrderDetailEntity
{

    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(name="id_linea", type="integer")
    */
    private int $id_linea;

    /**
    * @ORM\Column(name="id_pedido", type="integer")
    */
    private int $id_pedido;

    /**
    * @ORM\Column(name="codigo_producto", type="integer")
    */
    private int $codigo_producto;

    /**
     * @ORM\Column(name="cantidad", type="decimal", precision=2, scale=6)
     */
    private float $cantidad;

    /**
     * @ORM\Column(name="precio", type="decimal", precision=6, scale=6)
     */
    private float $precio;

    /**
     * Many Detail has One pedido
     * @ORM\ManyToOne(targetEntity="OrdersEntity", inversedBy="lineasPedidos")
     * @ORM\JoinColumn(name="id_pedido", referencedColumnName="id")
     */
    private OrdersEntity $pedidos;

    /**
     * Many Detail has One productos
     * @ORM\ManyToOne(targetEntity="ProductsEntity", inversedBy="detalles")
     * @ORM\JoinColumn(name="codigo_producto", referencedColumnName="codigo")
     */
    private ProductsEntity $productos;

    /**
     * Get the value of id_linea
     *
     * @return  int
     */
    public function getIdLinea()
    {
        return $this->id_linea;
    }

    /**
     * Set the value of id_linea
     *
     * @param  int  $id_linea
     *
     * @return  self
     */
    public function setIdLinea(int $id_linea)
    {
        $this->id_linea = $id_linea;

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
     * Get the value of codigo_producto
     *
     * @return  int
     */
    public function getCodigoProducto()
    {
        return $this->codigo_producto;
    }

    /**
     * Set the value of codigo_producto
     *
     * @param  int  $codigo_producto
     *
     * @return  self
     */
    public function setCodigoProducto(int $codigo_producto)
    {
        $this->codigo_producto = $codigo_producto;

        return $this;
    }

    /**
     * Get the value of cantidad
     *
     * @return  float
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     *
     * @param  float  $cantidad
     *
     * @return  self
     */
    public function setCantidad(float $cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }


    /**
     * Get the value of precio
     *
     * @return  float
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @param  float  $precio
     *
     * @return  self
     */
    public function setPrecio(float $precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get many Detail has One pedido
     *
     * @return  OrdersEntity
     */
    public function getPedidos()
    {
        return $this->pedidos;
    }

    /**
     * Set many Detail has One pedido
     *
     * @param  OrdersEntity  $pedidos  Many Detail has One pedido
     *
     * @return  self
     */
    public function setPedidos(OrdersEntity $pedidos)
    {
        $this->pedidos = $pedidos;

        return $this;
    }

    /**
     * Get many Detail has One productos
     *
     * @return  ProductsEntity
     */
    public function getProductos()
    {
        return $this->productos;
    }

    /**
     * Set many Detail has One productos
     *
     * @param  ProductsEntity  $productos  Many Detail has One productos
     *
     * @return  self
     */
    public function setProductos(ProductsEntity $productos)
    {
        $this->productos = $productos;

        return $this;
    }
}
