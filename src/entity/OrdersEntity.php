<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\OrdersRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass=OrdersRepository::class)
 * @ORM\Table(name="pedidos")
 */
class OrdersEntity
{

     /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(name="id", type="integer")
    */
    private int $id;

    /**
    * @ORM\Column(name="tipo", type="string", length=1)
    */
    private string $tipo;

    /**
    * @ORM\Column(name="fecha", type="date")
    */
    private DateTime $fecha;

    /**
    * @ORM\Column(name="observacion", type="string", length=255, nullable="true")
    */
    private ?string $observacion;

    /**
    * @ORM\Column(name="id_empresa", type="integer")
    */
    private int $id_empresa;

    /**
     * Many pedidos has One empresa
     * @ORM\ManyToOne(targetEntity="BusinessEntity", inversedBy="pedido")
     * @ORM\JoinColumn(name="id_empresa", referencedColumnName="id")
     */
    private BusinessEntity $empresa;

    /**
     * One pedios has Many facturas
     * @ORM\OneToMany(targetEntity="InvoicesEntity", mappedBy="pedido")
     */
    private Collection $facturas;

    /**
     * One pedios has Many facturas
     * @ORM\OneToMany(targetEntity="OrderDetailEntity", mappedBy="pedidos")
     */
    private Collection $lineasPedidos;

    public function __construct()
    {
        $this->facturas = new ArrayCollection();
        $this->lineasPedidos = new ArrayCollection();
    }

    /**
     * Get the value of id
     *
     * @return  int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param  int  $id
     *
     * @return  self
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of tipo
     *
     * @return  string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @param  string  $tipo
     *
     * @return  self
     */
    public function setTipo(string $tipo)
    {
        $this->tipo = $tipo;

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
     * Get the value of observacion
     *
     * @return  ?string
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set the value of observacion
     *
     * @param  ?string  $observacion
     *
     * @return  self
     */
    public function setObservacion(?string $observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Get the value of id_empresa
     *
     * @return  int
     */
    public function getIdEmpresa()
    {
        return $this->id_empresa;
    }

    /**
     * Set the value of id_empresa
     *
     * @param  int  $id_empresa
     *
     * @return  self
     */
    public function setIdEmpresa(int $id_empresa)
    {
        $this->id_empresa = $id_empresa;

        return $this;
    }

    /**
     * Get many pedidos has One empresa
     *
     * @return  BusinessEntity
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set many pedidos has One empresa
     *
     * @param  BusinessEntity  $empresa  Many pedidos has One empresa
     *
     * @return  self
     */
    public function setEmpresa(BusinessEntity $empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get one pedios has Many facturas
     *
     * @return  Collection
     */
    public function getFacturas()
    {
        return $this->facturas;
    }

    /**
     * Set one pedios has Many facturas
     *
     * @param  Collection  $facturas  One pedios has Many facturas
     *
     * @return  self
     */
    public function setFacturas(Collection $facturas)
    {
        $this->facturas = $facturas;

        return $this;
    }

    /**
     * Get one pedios has Many facturas
     *
     * @return  Collection
     */
    public function getLineasPedidos()
    {
        return $this->lineasPedidos;
    }

    /**
     * Set one pedios has Many facturas
     *
     * @param  Collection  $lineasPedidos  One pedios has Many facturas
     *
     * @return  self
     */
    public function setLineasPedidos(Collection $lineasPedidos)
    {
        $this->lineasPedidos = $lineasPedidos;

        return $this;
    }
}
