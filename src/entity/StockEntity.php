<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\StockRepository;
use DateTime;

/**
 * @ORM\Entity(RepositoryClass=StockRepository::class)
 * @ORM\Table(name="stock")
 */
class StockEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id_move")
     */
    private $id_mov;

    /**
     * @ORM\Column(name="fecha", type="date")
     */
    private $date_stock;

    //########## ASOCIACION CON CODIGO DE LA TABLA PRODUCTOS
    /**
     * @ORM\ManyToOne(targetEntity="ProductsEntity", inversedBy="stock_code_product")
     * @ORM\JoinColumn(name="producto", referencedColumn="codigo")
     */
    private ProductsEntity $products_code_product_stock;

    /**
     * @ORM\Column(name="cantidad", type="decimal", scale="6", precision="2")
     */
    private int $amount;

    /**
     * @ORM\Column(name="stock", type="decimal", scale="6", precision="2")
     */
    private int $stock;

    /**
     * @ORM\Column(name="precio", type="decimal", scale="6", precision="2")
     */
    private int $prize;

    /**
     *@ORM\Column(name="unidad", type="string", length="3")
     */
    private string $unit;

    //########### ASOCIACIÓN CON NOMBRE D ELA TABLA ALMACENES
    /**
     * @ORM\ManyToOne(targetEntity="WarehousesEntity", iversedBy="stock_name_warehouses")
     * @ORM\JoinToColumn(name="almacen", referencedColumn="nombre")
     */
    private WarehousesEntity $warehouses_name_warehouses_from_stock;

    /**
     * Get the value of id_mov
     */
    public function getIdMov()
    {
        return $this->id_mov;
    }

    /**
     * Set the value of id_mov
     *
     * @return  self
     */
    public function setIdMov($id_mov)
    {
        $this->id_mov = $id_mov;

        return $this;
    }

    /**
     * Get the value of date_stock
     */
    public function getDateStock()
    {
        return $this->date_stock;
    }

    /**
     * Set the value of date_stock
     *
     * @return  self
     */
    public function setDateStock($date_stock)
    {
        $this->date_stock = $date_stock;

        return $this;
    }

    /**
     * Get the value of products_code_product_stock
     *
     * @return  ProductsEntity
     */
    public function getProductsCodeProductStock()
    {
        return $this->products_code_product_stock;
    }

    /**
     * Set the value of products_code_product_stock
     *
     * @param  ProductsEntity  $products_code_product_stock
     *
     * @return  self
     */
    public function setProductsCodeProductStock(ProductsEntity $products_code_product_stock)
    {
        $this->products_code_product_stock = $products_code_product_stock;

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
     * Get the value of stock
     *
     * @return  int
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @param  int  $stock
     *
     * @return  self
     */
    public function setStock(int $stock)
    {
        $this->stock = $stock;

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

    /**
     * Get *@ORM\Column(name="unidad", type="string", length="3")
     *
     * @return  string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set *@ORM\Column(name="unidad", type="string", length="3")
     *
     * @param  string  $unit  *@ORM\Column(name="unidad", type="string", length="3")
     *
     * @return  self
     */
    public function setUnit(string $unit)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get the value of warehouses_name_warehouses_from_stock
     *
     * @return  WarehousesEntity
     */
    public function getWarehousesNameWarehousesFromStock()
    {
        return $this->warehouses_name_warehouses_from_stock;
    }

    /**
     * Set the value of warehouses_name_warehouses_from_stock
     *
     * @param  WarehousesEntity  $warehouses_name_warehouses_from_stock
     *
     * @return  self
     */
    public function setWarehousesNameWarehousesFromStock(WarehousesEntity $warehouses_name_warehouses_from_stock)
    {
        $this->warehouses_name_warehouses_from_stock = $warehouses_name_warehouses_from_stock;

        return $this;
    }
}
