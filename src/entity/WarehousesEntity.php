<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\WarehousesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(RepositoryClass=WarehousesRepository::class)
 * @ORM\Table(name="almacenes")
 */
class WarehousesEntity
{
    /**
     * @ORM\Column(name="nombre", type="string", length="5")
     */
    private $name_warehouse;

    /**
     * @ORM\Column(name="localizacion", type="string", length="255")
     */
    private $location;

    /**
     * @ORM\Column(name="descripcion", type="string", length="255")
     */
    private $description;

    //############## ASOCIACIÓN CON ALMACEN DE LA TABLA PRODUCTOS
    /**
     * @ORM\OneToMany(targetEntity="ProductsEntity", mappedBy="warehouses_name_warehouses")
     */
    private Collection $products_name_warehouses;

    //############## ASOCIACIÓN CON ALMACEN DE LA TABLA STOCK
    /**
     * @ORM\OneToMany(targetEntity="StockEntity", mappedBy="warehouses_name_warehouses_from_stock)
     */
    private Collection $stock_name_warehouses;

    public function __construct()
    {
        $this->products_name_warehouses = new ArrayCollection();
        $this->stock_name_warehouses = new ArrayCollection();
    }

    /**
     * Get the value of name_warehouse
     */
    public function getNameWarehouse()
    {
        return $this->name_warehouse;
    }

    /**
     * Set the value of name_warehouse
     *
     * @return  self
     */
    public function setNameWarehouse($name_warehouse)
    {
        $this->name_warehouse = $name_warehouse;

        return $this;
    }

    /**
     * Get the value of location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set the value of location
     *
     * @return  self
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of products_name_warehouses
     *
     * @return  Collection
     */
    public function getProductsNameWarehouses()
    {
        return $this->products_name_warehouses;
    }

    /**
     * Set the value of products_name_warehouses
     *
     * @param  Collection  $products_name_warehouses
     *
     * @return  self
     */
    public function setProductsNameWarehouses(Collection $products_name_warehouses)
    {
        $this->products_name_warehouses = $products_name_warehouses;

        return $this;
    }

    /**
     * Get the value of stock_name_warehouses
     *
     * @return  Collection
     */
    public function getStockNameWarehouses()
    {
        return $this->stock_name_warehouses;
    }

    /**
     * Set the value of stock_name_warehouses
     *
     * @param  Collection  $stock_name_warehouses
     *
     * @return  self
     */
    public function setStockNameWarehouses(Collection $stock_name_warehouses)
    {
        $this->stock_name_warehouses = $stock_name_warehouses;

        return $this;
    }
}
