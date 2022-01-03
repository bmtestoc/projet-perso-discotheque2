<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\CreateType;
use App\Entity\Liste;
use Doctrine\ORM\EntityManagerInterface;

class CreateDiscController extends AbstractController
{
    #[Route('/create', name: 'create')]
    public function createDisc(Request $request, EntityManagerInterface $em): Response
    {
        $disc = new Liste();

        $form = $this->createForm(CreateType::class, $disc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em->persist($disc);
            $em->flush();
            return $this->redirectToRoute('home');
        }
        
        return $this->render('create_disc/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
