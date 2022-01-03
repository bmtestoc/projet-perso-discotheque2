<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\CreateType;
use App\Entity\Liste;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;

class UpdateDiscController extends AbstractController
{
    #[Route('/update/{id}', name: 'update')]
    public function updateDisc(PersistenceManagerRegistry $doctrine, Request $request, EntityManagerInterface $em, $id): Response
    {
        $disc = $doctrine->getRepository(Liste::class);
        $disc = $disc->find($id);

        $form = $this->createForm(CreateType::class, $disc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em->persist($disc);
            $em->flush();
            return $this->redirectToRoute('home');
        }
        
        return $this->render('update_disc/update.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
