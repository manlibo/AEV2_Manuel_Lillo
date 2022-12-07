<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\WarehousesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass=WarehousesRepository::class)
 * @ORM\Table(name="almacenes")
 */

 class WarehousesEntity{

    /**
    * @ORM\Id
    * @ORM\Column(name="nombre", type="string", length=5)
    */
    private string $nombre;

    /**
     * @ORM\Column(name="localizacion", type="string", length=255, nullable="true")
     */
    private ?string $localizacion;

    /**
     * @ORM\Column(name="descripcion", type="string", length=255, nullable="true")
     */
    private ?string $descripcion;

    /**
     * @ORM\OneToMany(targetEntity="ProductsEntity", mappedBy="almaProducto")
     */
    private Collection $prodAlmacen;

    public function __construct()
    {
        $this->prodAlmacen = new ArrayCollection();

    }

    /**
     * Get the value of nombre
     *
     * @return  string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @param  string  $nombre
     *
     * @return  self
     */
    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of localizacion
     *
     * @return  ?string
     */
    public function getLocalizacion()
    {
        return $this->localizacion;
    }

    /**
     * Set the value of localizacion
     *
     * @param  ?string  $localizacion
     *
     * @return  self
     */
    public function setLocalizacion(?string $localizacion)
    {
        $this->localizacion = $localizacion;

        return $this;
    }

    /**
     * Get the value of descripcion
     *
     * @return  ?string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @param  ?string  $descripcion
     *
     * @return  self
     */
    public function setDescripcion(?string $descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    

    /**
     * Get one almacen has Many productos
     *
     * @return  Collection
     */
    public function getProdAlmacen()
    {
        return $this->prodAlmacen;
    }

    /**
     * Set one almacen has Many productos
     *
     * @param  Collection  $prodAlmacen  One almacen has Many productos
     *
     * @return  self
     */
    public function setProdAlmacen(Collection $prodAlmacen)
    {
        $this->prodAlmacen = $prodAlmacen;

        return $this;
    }
 }