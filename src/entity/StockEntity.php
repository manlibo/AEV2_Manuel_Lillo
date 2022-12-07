<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\StockRepository;
use DateTime;

/**
 * @ORM\Entity(RepositoryClass=StockRepository::class)
 * @ORM\Table(name="stock")
 */
class StockEntity {
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(name="id_mov", type="integer")
    */
    private int $id_mov;

    /**
     * @ORM\Column(name="fecha", type="date")
     */
    private DateTime $fecha;

    /**
    * @ORM\Column(name="producto", type="integer")
    */
    private int $producto;

    /**
     * @ORM\Column(name="cantidad", type="decimal", precision=6, scale=2)
     */
    private float $cantidad;

    /**
     * @ORM\Column(name="stock", type="decimal", precision=6, scale=2)
     */
    private float $stock;

    /**
     * @ORM\Column(name="precio", type="decimal", precision=6, scale=2)
     */
    private float $precio;

    /**
     * @ORM\Column(name="unidad", type="string", length=3)
     */
    private string $unidad;

    /**
     * @ORM\Column(name="almacen", type="string", length=5)
     */
    private string $almacen;

    /**
     * Many stock has One productos
     * @ORM\ManyToOne(targetEntity="ProductsEntity", inversedBy="stock")
     * @ORM\JoinColumn(name="producto", referencedColumnName="codigo")
     */
    private ProductsEntity $prodStock;
    

    /**
     * Get the value of id_mov
     *
     * @return  int
     */
    public function getIdMov()
    {
        return $this->id_mov;
    }

    /**
     * Set the value of id_mov
     *
     * @param  int  $id_mov
     *
     * @return  self
     */
    public function setIdMov(int $id_mov)
    {
        $this->id_mov = $id_mov;

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
     * Get the value of producto
     *
     * @return  int
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set the value of producto
     *
     * @param  int  $producto
     *
     * @return  self
     */
    public function setProducto(int $producto)
    {
        $this->producto = $producto;

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
     * Get the value of stock
     *
     * @return  float
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @param  float  $stock
     *
     * @return  self
     */
    public function setStock(float $stock)
    {
        $this->stock = $stock;

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
     * Get the value of unidad
     *
     * @return  string
     */
    public function getUnidad()
    {
        return $this->unidad;
    }

    /**
     * Set the value of unidad
     *
     * @param  string  $unidad
     *
     * @return  self
     */
    public function setUnidad(string $unidad)
    {
        $this->unidad = $unidad;

        return $this;
    }

    /**
     * Get the value of almacen
     *
     * @return  string
     */
    public function getAlmacen()
    {
        return $this->almacen;
    }

    /**
     * Set the value of almacen
     *
     * @param  string  $almacen
     *
     * @return  self
     */
    public function setAlmacen(string $almacen)
    {
        $this->almacen = $almacen;

        return $this;
    }

    /**
     * Get many stock has One productos
     *
     * @return  ProductsEntity
     */
    public function getProdStock()
    {
        return $this->prodStock;
    }

    /**
     * Set many stock has One productos
     *
     * @param  ProductsEntity  $prodStock  Many stock has One productos
     *
     * @return  self
     */
    public function setProdStock(ProductsEntity $prodStock)
    {
        $this->prodStock = $prodStock;

        return $this;
    }
}