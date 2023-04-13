<?php

namespace App\Controller;

use App\Entity\Usersubscriptions;
use App\Form\UsersubscriptionsType;
use App\Repository\UsersubscriptionsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin')]
class AdminUsersubscriptionsController extends AbstractController
{
    private $userSubscriptionsRepository;
    private $entityManager;

    public function __construct(
        UsersubscriptionsRepository $userSubscriptionsRepository,
        EntityManagerInterface $entityManager
    ) {
        $this->userSubscriptionsRepository = $userSubscriptionsRepository;
        $this->entityManager = $entityManager;
    }

    #[Route('/usersubscriptions', name: 'app_admin_usersubscriptions')]
    public function index(): Response
    {
        return $this->render('admin_usersubscriptions/index.html.twig', [
            'controller_name' => 'AdminUsersubscriptionsController',
        ]);
    }

    #[Route("/subscription", name:"admin_subscription_list")]
    public function listAdminSubscription(): Response
    {
        // Retrieve all UserSubscription entities from the database
        $userSubscriptions = $this->userSubscriptionsRepository->findAll();

        return $this->render('adminsubscriptions/list.html.twig', [
            'userSubscriptions' => $userSubscriptions,
        ]);
    }

    #[Route("/subscriptions/create", name:"admin_subscription_create")]
    public function createAdminSubscriptions(Request $request): Response
    {
        // Create a new UserSubscriptions entity
        $userSubscription = new Usersubscriptions();

        // Bind the UserSubscription entity to a form
        $form = $this->createForm(UsersubscriptionsType::class, $userSubscription);

        // Handle the form submission
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Save the UserSubscription entity to the database
            $this->entityManager->persist($userSubscription);
            $this->entityManager->flush();

            return $this->redirectToRoute('admin_subscription_list');
        }

        return $this->render('adminsubscriptions/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route("/subscriptions/show/{id}", name:"admin_subscription_show")]
    public function showAdminSubscription($id): Response
    {
        // Retrieve the UserSubscription entity from the database
        $userSubscription = $this->userSubscriptionsRepository->find($id);

        return $this->render('adminsubscriptions/show.html.twig', [
            'userSubscription' => $userSubscription,
        ]);
    }

    #[Route("/subscriptions/update/{id}", name:"admin_subscription_update")]
    public function updateAdminSubscriptions(Request $request, $id): Response
    {
        // Retrieve the UserSubscriptions entity from the database
        $userSubscription = $this->userSubscriptionsRepository->find($id);

        // Bind the UserSubscriptions entity to a form
        $form = $this->createForm    (UsersubscriptionsType::class, $userSubscription);

        // Handle the form submission
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Save the UserSubscription entity to the database
            $this->entityManager->persist($userSubscription);
            $this->entityManager->flush();
    
            return $this->redirectToRoute('admin_subscription_show', ['id' => $userSubscription->getId()]);
        }
    
        return $this->render('adminsubscriptions/update.html.twig', [
            'form' => $form->createView(),
            'userSubscription' => $userSubscription,
        ]);
    }
    
    #[Route("/subscription/delete/{id}", name:"admin_subscription_delete")]
    public function deleteAdminSubscriptions($id): Response
    {
        // Retrieve the UserSubscription entity from the database
        $userSubscription = $this->userSubscriptionsRepository->find($id);
    
        // Delete the UserSubscription entity from the database
        $this->entityManager->remove($userSubscription);
        $this->entityManager->flush();
    
        return $this->redirectToRoute('admin_subscription_list');
    }
}
    
