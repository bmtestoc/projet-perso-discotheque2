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


class DeleteDiscController extends AbstractController
{
    #[Route('/delete/{id}', name: 'delete')]
    public function deleteDisc(PersistenceManagerRegistry $doctrine, Request $request, EntityManagerInterface $em, $id): Response
    {
        $em = $doctrine->getManager();
        $disc = $doctrine->getRepository(Liste::class);
        $disc = $disc->find($id);
        if (!$disc) {
            throw $this->createNotFoundException(
                'There is no disc with the following id: ' . $id
            );
        }
        $em->remove($disc);
        $em->flush();
        return $this->redirectToRoute('home');

    }
}
