<?php
// src/entity/ProductsEntity.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass=ProductsRepository::class)
 * @ORM\Table(name="productos")
 */

class ProductsEntity
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(name="codigo", type="integer")
    */
    private int $codigo;

    /**
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private string $descripcion;

    /**
     * @ORM\Column(name="almacen", type="string", length=5)
     */
    private string $almacen;

    /**
     * @ORM\Column(name="unidad", type="string", length=4)
     */
    private string $unidad;
    
    /**
     * @ORM\Column(name="clasificacion", type="string", length=1, nullable="true")
     */
    private ?string $clasificacion;

    /**
     * @ORM\Column(name="preciounidad", type="decimal", precision=6, scale=2)
     */
    private float $precioUnidad;

    /**
     * @ORM\OneToMany(targetEntity="OrderDetailEntity", mappedBy="productos")
     */
    //private Collection $detalles;

    /**
     * @ORM\OneToMany(targetEntity="StockEntity", mappedBy="prodStock")
     */
    private Collection $stock;

    public function __construct()
    {
        $this->detalles = new ArrayCollection();
        $this->stock = new ArrayCollection();

    }

    /**
     * @ORM\ManyToOne(targetEntity="WarehousesEntity", inversedBy="prodAlmacen")
     * @ORM\JoinColumn(name="almacen", referencedColumnName="nombre")
     */
    private WarehousesEntity $almaProducto;


    /**
     * Get the value of codigo
     *
     * @return  int
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set the value of codigo
     *
     * @param  int  $codigo
     *
     * @return  self
     */
    public function setCodigo(int $codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get the value of descripcion
     *
     * @return  string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @param  string  $descripcion
     *
     * @return  self
     */
    public function setDescripcion(string $descripcion)
    {
        $this->descripcion = $descripcion;

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
     * Get the value of clasificacion
     *
     * @return  ?string
     */
    public function getClasificacion()
    {
        return $this->clasificacion;
    }

    /**
     * Set the value of clasificacion
     *
     * @param  ?string  $clasificacion
     *
     * @return  self
     */
    public function setClasificacion(?string $clasificacion)
    {
        $this->clasificacion = $clasificacion;

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
     * Get one prodcuto has Many lineaspedidos
     *
     * @return  Collection
     */
    public function getDetalles()
    {
        return $this->detalles;
    }

    /**
     * Set one prodcuto has Many lineaspedidos
     *
     * @param  Collection  $detalles  One prodcuto has Many lineaspedidos
     *
     * @return  self
     */
    public function setDetalles(Collection $detalles)
    {
        $this->detalles = $detalles;

        return $this;
    }

    /**
     * Get one prodcuto has Many stocks
     *
     * @return  Collection
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set one prodcuto has Many stocks
     *
     * @param  Collection  $stock  One prodcuto has Many stocks
     *
     * @return  self
     */
    public function setStock(Collection $stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get many productos has One almacenes
     *
     * @return  WarehousesEntity
     */
    public function getAlmaProducto()
    {
        return $this->almaProducto;
    }

    /**
     * Set many productos has One almacenes
     *
     * @param  WarehousesEntity  $almaProducto  Many productos has One almacenes
     *
     * @return  self
     */
    public function setAlmaProducto(WarehousesEntity $almaProducto)
    {
        $this->almaProducto = $almaProducto;

        return $this;
    }
}