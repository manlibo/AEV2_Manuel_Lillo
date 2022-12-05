<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(RepositoryClass=ProductsRepository::class)
 * @ORM\Table(name="productos")
 */
class ProductsEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="codigo", type="integer")
    */
    private int $code_product;

    /**
     * @ORM\Column(name="descripcion", type="string", length="255")
     */
    private string $description;

    //########ASOCIACIÓN CON nombre de la tabla almacenes
    /**
     * @ORM\ManyToOne(targetEntity="WarehousesEntity", inversedBy="products_name_warehouses")
     * @ORM\JoinColumn(name="almacen", referencedColumnName="nombre")
     */
    private WarehousesEntity $warehouses_name_warehouses;

    /**
     * @ORM\Column(name="unidad", type="string", length="4")
     */
    private string $unit;

    /**
     * @ORM\Column(name="clasificacion", type="string", length="1")
     */
    private ?string $rating;

    /**
     * @ORM\Column(name"preciounidad", type"decimal", scale="6", precision="2")
     */
    private int $unit_prize;

    //########ASOCIACIÓN CON codigo_producto de la tabla lineaspedidos
    /**
     * @ORM\OneToMany(targetEntity="OrderDetailEntity", mappedBy="products_code_product")
     */
    private Collection $detail_code_product;

    //########ASOCIACIÓN CON producto de la tabla stock
    /**
     * @ORM\OneToMany(targetEntity="StockEntity", mappedBy="products_code_product_stock")
     */
    private Collection $stock_code_product;
    
    public function __construct()
    {
        $this->detail_code_product = new ArrayCollection();
        $this->stock_code_product = new ArrayCollection();
    }



    /**
     * Get the value of code_product
     *
     * @return  int
     */
    public function getCodeProduct()
    {
        return $this->code_product;
    }

    /**
     * Set the value of code_product
     *
     * @param  int  $code_product
     *
     * @return  self
     */
    public function setCodeProduct(int $code_product)
    {
        $this->code_product = $code_product;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return  string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param  string  $description
     *
     * @return  self
     */
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of warehouses_name_warehouses
     *
     * @return  WarehousesEntity
     */
    public function getWarehousesNameWarehouses()
    {
        return $this->warehouses_name_warehouses;
    }

    /**
     * Set the value of warehouses_name_warehouses
     *
     * @param  WarehousesEntity  $warehouses_name_warehouses
     *
     * @return  self
     */
    public function setWarehousesNameWarehouses(WarehousesEntity $warehouses_name_warehouses)
    {
        $this->warehouses_name_warehouses = $warehouses_name_warehouses;

        return $this;
    }

    /**
     * Get the value of unit
     *
     * @return  string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set the value of unit
     *
     * @param  string  $unit
     *
     * @return  self
     */
    public function setUnit(string $unit)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get the value of rating
     *
     * @return  string
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set the value of rating
     *
     * @param  string  $rating
     *
     * @return  self
     */
    public function setRating(string $rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get the value of unit_prize
     *
     * @return  int
     */
    public function getUnitPrize()
    {
        return $this->unit_prize;
    }

    /**
     * Set the value of unit_prize
     *
     * @param  int  $unit_prize
     *
     * @return  self
     */
    public function setUnitPrize(int $unit_prize)
    {
        $this->unit_prize = $unit_prize;

        return $this;
    }

    /**
     * Get the value of detail_code_product
     *
     * @return  Collection
     */
    public function getDetailCodeProduct()
    {
        return $this->detail_code_product;
    }

    /**
     * Set the value of detail_code_product
     *
     * @param  Collection  $detail_code_product
     *
     * @return  self
     */
    public function setDetailCodeProduct(Collection $detail_code_product)
    {
        $this->detail_code_product = $detail_code_product;

        return $this;
    }

    /**
     * Get the value of stock_code_product
     *
     * @return  Collection
     */
    public function getStockCodeProduct()
    {
        return $this->stock_code_product;
    }

    /**
     * Set the value of stock_code_product
     *
     * @param  Collection  $stock_code_product
     *
     * @return  self
     */
    public function setStockCodeProduct(Collection $stock_code_product)
    {
        $this->stock_code_product = $stock_code_product;

        return $this;
    }
}
