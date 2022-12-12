<?php

namespace App\Controllers;

use App\Core\EntityManager;
use App\Entity\BusinessEntity;
use App\Core\AbstractController;
use Doctrine\ORM\EntityRepository;

class BusinessController extends AbstractController
{

    //Clase para listar todos Los datos de la tabla productos.
    public function listBusiness()
    {
        $entityManager = (new EntityManager())->getEntityManager();
        $businessRepository = $entityManager->getRepository(BusinessEntity::class);
        $business = $businessRepository->findAll();
        $this->render(
            "products.html.twig",
            ['title_head'=>'BUSINESS',
            'business'=>$business]
        );
    }

    public function updateBusiness($id){
        //echo("funciona");
        //var_dump($_POST);
        $entityManager = (new EntityManager)->getEntityManager();
        $businessRepository = $entityManager->getRepository(BusinessEntity::class);
        $business = $businessRepository->find($id);
        $business->setNombre($_POST['nombre']);
        $business->setCIF($_POST['CIF']);
        $business->setTipo($_POST['type']);
        $entityManager->persist($business);
        $entityManager->flush(); 
        header("Location: http://localhost:8000/business");
    }

    public function formEditBusiness($id){
        $entityManager = (new EntityManager)->getEntityManager();
        $businessRepository = $entityManager->getRepository(BusinessEntity::class);
        // Recupero la entidad por su id
        $business = $businessRepository->find($id);
        if ($business) {
            //echo("Entidad encontrada");
            //var_dump($business);
            $this->render(
                "business.html.twig",
                ['title_head'=>'BUSINESS',
                'business'=>$business]
            ); 

        } else {
            echo("No lo he encontrado");
        } 
    }

    public function formInsertBusiness(){
        $entityManager = (new EntityManager)->getEntityManager();
        $businessRepository = $entityManager->getRepository(BusinessEntity::class);
        
            $this->render(
                "form.html.twig",
                ['title_head'=>'BUSINESS']
            ); 

       
    }

    public function InsertBusiness(/* string $nombre, string $CIF, string $tipo */){
        $entityManager = (new EntityManager)->getEntityManager();
        //$businessRepository = $entityManager->getRepository(BusinessEntity::class);
        
        $business = new BusinessEntity;
        
        $business->setNombre($_POST['nombre']);
        $business->setCIF($_POST['CIF']);
        $business->setTipo($_POST['type']);
        $entityManager->persist($business);
        $entityManager->flush(); 
        header("Location: http://localhost:8000/business");
        /* $this->render(
            "products.html.twig",
            ['title_head'=>'BUSINESS']
        ); */
    }

    public function deleteBusiness(int $id){
        $entityManager = (new EntityManager)->getEntityManager();
        $businessRepository = $entityManager->getRepository(BusinessEntity::class);
        // Recupero la entidad por su id
        $business = $businessRepository->find($id);
        //Paso al método remove() toda la entidad para borrarla
        $entityManager->remove($business);
        $entityManager->flush();
        //echo("Has borrado con éxito");
        header("Location: http://localhost:8000/business");

    }
}
