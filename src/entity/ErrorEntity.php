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
    
}