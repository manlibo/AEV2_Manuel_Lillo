<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\OrderDetailRepository;

/**
 * @ORM\Entity(RepositoryClass=OrderDetailRepository::class)
 * @ORM\Table(name="lineaspedidos")
 */
class OrderDetailEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Colum(name="id_linea", type="integer")
     */
    private int $id_detail;

    //############ ASOCIACIÓN ID_PEDIDO CON ID DE TABLA PEDIDOS >>>order_id_order<<<
    /**
     *@ORM\ManyToOne(targetEntity="OrdersEntity" inversedBy="detail_id_order")
     *@ORM\JoinColumn(name="id_pedido", referenceColumn="id")
     */
    private int $order_id_order;

    //############ ASOCIACIÓN CODIGO_PRODUCTO CON CODIGO DE LA TABLA PRODUCTOS
    /** @ORM\ManyToOne(targetEntity="ProductsEntity" inversedBy="detail_code_product")
     * @ORM\JoinColumn(name="codigo_producto", referencedColumnName="codigo")
     */
    private ProductsEntity $products_code_product;

    /**
     * @ORM\Column(name="cantidad", type="decimal", scale="6", precision="2")
     */
    private int $amount;

    /**
     * @ORM\Column(name="precio", type="decimal", scale="6", precision="2")
     */
    private int $prize;


    /**
     * Get the value of id_detail
     *
     * @return  int
     */
    public function getIdDetail()
    {
        return $this->id_detail;
    }

    /**
     * Set the value of id_detail
     *
     * @param  int  $id_detail
     *
     * @return  self
     */
    public function setIdDetail(int $id_detail)
    {
        $this->id_detail = $id_detail;

        return $this;
    }

    /**
     * Get *@ORM\JoinColumn(name="id_pedido", referenceColumn="id")
     *
     * @return  int
     */
    public function getOrderIdOrder()
    {
        return $this->order_id_order;
    }

    /**
     * Set *@ORM\JoinColumn(name="id_pedido", referenceColumn="id")
     *
     * @param  int  $order_id_order  *@ORM\JoinColumn(name="id_pedido", referenceColumn="id")
     *
     * @return  self
     */
    public function setOrderIdOrder(int $order_id_order)
    {
        $this->order_id_order = $order_id_order;

        return $this;
    }

    /**
     * Get the value of products_code_product
     *
     * @return  int
     */
    public function getProductsCodeProduct()
    {
        return $this->products_code_product;
    }

    /**
     * Set the value of products_code_product
     *
     * @param  int  $products_code_product
     *
     * @return  self
     */
    public function setProductsCodeProduct(int $products_code_product)
    {
        $this->products_code_product = $products_code_product;

        return $this;
    }

    /**
     * Get the value of amount
     *
     * @return  int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     *
     * @param  int  $amount
     *
     * @return  self
     */
    public function setAmount(int $amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get the value of prize
     *
     * @return  int
     */
    public function getPrize()
    {
        return $this->prize;
    }

    /**
     * Set the value of prize
     *
     * @param  int  $prize
     *
     * @return  self
     */
    public function setPrize(int $prize)
    {
        $this->prize = $prize;

        return $this;
    }
}
