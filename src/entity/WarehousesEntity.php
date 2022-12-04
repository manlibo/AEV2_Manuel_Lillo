<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\WarehousesRepository;

/**
 * @ORM\Entity(RepositoryClass=WarehousesRepository::class)
 * @ORM\Table(name="almacenes")
 */
class WarehousesEntity{

}
