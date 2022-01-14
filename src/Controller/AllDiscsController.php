<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Liste;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;

class AllDiscsController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function showAllDiscs(PersistenceManagerRegistry $doctrine): Response
    {
        $liste = $doctrine->getRepository(Liste::class)
        ->findAll();
               return $this->render('all_discs/home.html.twig', [
          'controller_name' => 'AllDiscsController',
          'liste' => $liste,
         ]);
     }
}
