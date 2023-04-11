<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\UsersubscriptionsType;
use App\Entity\Subscriptions;
use App\Entity\Usersubscriptions;





class UsersubscriptionsController extends AbstractController
{
    #[Route('/usersubscriptions', name: 'app_usersubscriptions')]
    public function index(): Response
    {
        return $this->render('usersubscriptions/index.html.twig', [
            'controller_name' => 'UsersubscriptionsController',
        ]);
    }
    
    #[Route('/usersubscriptions/create', name: 'usersubscriptions_create')]
    public function createUsersubscriptions(Request $request): Response
    {
        $userSubscription = new Usersubscriptions();
 

        $form = $this->createForm(UsersubscriptionsType::class, $userSubscription);
        
        // Handle the form submission
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Save the UserSubscription entity to the database
            $this->entityManager->persist($userSubscription);
            $this->entityManager->flush();

            return $this->render('confirmation.html.twig', [
                'userSubscription' => $userSubscription,
            ]);
        }

        return $this->render('usersubscriptions/create.html.twig', [
            'form' => $form->createView(),
        ]);

    }

}
