<?php

namespace App\Controller;

use Symfony\Component\Serializer\Serializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Interv;
use App\Entity\Clown;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Validator\Constraints\Collection;


#[Route('/api', name: 'api')]
class ApiController extends AbstractController

{   

    #[Route('/allClown', name: 'allClown')]
    public function allclown(): Response
    {
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header("Content-Type: application/json");

             $products = $this->getDoctrine()
            ->getRepository(Clown::class)
            ->findAll();
 
        $data = [];
 
        foreach ($products as $product) {
            $data[] = [
               'id' => $product->getId(),
               'pseudo' => $product->getPseudo(),
               'actif' => $product->isActif(),
               'sexeHomme' => $product->isHomme(),
               'musicien' => $product->isMusicien(),
               'couleur' => $product->getCouleur(),
                        ];
        }
 
        return $this->json($data);
    }
       
    #[Route('/allInterv', name: 'allInterv')]
    public function allinterv(): Response
    {
        header("Access-Control-Allow-Methods: PUT");
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header("Content-Type: application/json");

             $products = $this->getDoctrine()
            ->getRepository(Interv::class)
            ->findAll();
      
        $data = [];
 

        
        foreach ($products as $product) {
            $data[] = [
               'id' => $product->getId(),
               'dateheure' => $product->getDateheure(),
               'clownA' => $product->getApiClownA(),
               'clownB' => $product->getApiClownB(),
               'lieu_id' => $product->getApiLieu(),
               'statut' => $product->getStatut(),
           ];
        }
        
      
   
        return $this->json($data);
    }
    
    
}

    
    

 
   
