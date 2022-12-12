<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\BusinessRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass=BusinessRepository::class)
 * @ORM\Table(name="empresas")
 */
class BusinessEntity
{

    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(name="id", type="integer")
    */
    private int $id;

    /**
    * @ORM\Column(name="nombre", type="string", length=255)
    */
    private string $nombre;

    /**
    * @ORM\Column(name="CIF", type="string", length=9)
    */
    private string $CIF;

    /**
    * @ORM\Column(name="tipo", type="string", length=1)
    */
    private string $tipo;

    /**
     * One empresa has Many pedidos
     * @ORM\OneToMany(targetEntity="OrdersEntity", mappedBy="empresa")
     */
    private Collection $pedido;

    public function __construct()
    {
        $this->pedido = new ArrayCollection();
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
     * Get the value of CIF
     *
     * @return  string
     */
    public function getCIF()
    {
        return $this->CIF;
    }

    /**
     * Set the value of CIF
     *
     * @param  string  $CIF
     *
     * @return  self
     */
    public function setCIF(string $CIF)
    {
        $this->CIF = $CIF;

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
     * Get one empresa has Many pedidos
     *
     * @return  Collection
     */
    public function getPedido()
    {
        return $this->pedido;
    }

    /**
     * Set one empresa has Many pedidos
     *
     * @param  Collection  $pedido  One empresa has Many pedidos
     *
     * @return  self
     */
    public function setPedido(Collection $pedido)
    {
        $this->pedido = $pedido;

        return $this;
    }
}
