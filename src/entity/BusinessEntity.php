<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\BusinessRepository;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(RepositoryClass=BusinessRepository::class)
 * @ORM\Table(name="empresas")
 */
class BusinessEntity
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id", type="integer")
     */
    private int $id_business;

    /**
     * @ORM\Column(name="nombre", type="string", length="255")
     */
    private string $name_business;

    /**
    * @ORM\Column(name="CIF", type="string", length="9")
    */
    private string $CIF;

    /**
    * @ORM\Column(name="tipo", type="string", length="1")
    */
    private string $type_business;


    //########ASOCIACIÓN CON id_empresa de la tabla pedidos
    /**
     * @ORM\OneToMany(targetEntity="OrdersEntity", mappedBy="business_id_business") 
     */
    private Collection $orders_id_business;

    /**
     * Get the value of id_business
     *
     * @return  int
     */
    public function getIdBusiness()
    {
        return $this->id_business;
    }

    /**
     * Set the value of id_business
     *
     * @param  int  $id_business
     *
     * @return  self
     */
    public function setIdBusiness(int $id_business)
    {
        $this->id_business = $id_business;

        return $this;
    }

    /**
     * Get the value of name_business
     *
     * @return  string
     */
    public function getNameBusiness()
    {
        return $this->name_business;
    }

    /**
     * Set the value of name_business
     *
     * @param  string  $name_business
     *
     * @return  self
     */
    public function setNameBusiness(string $name_business)
    {
        $this->name_business = $name_business;

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
     * Get the value of type_business
     *
     * @return  string
     */
    public function getTypeBusiness()
    {
        return $this->type_business;
    }

    /**
     * Set the value of type_business
     *
     * @param  string  $type_business
     *
     * @return  self
     */
    public function setTypeBusiness(string $type_business)
    {
        $this->type_business = $type_business;

        return $this;
    }
}
