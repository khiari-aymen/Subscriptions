<?php

namespace App\Controller;

use App\Entity\UserSubscriptions;
use App\Form\UserSubscriptionsType;
use App\Repository\UserSubscriptionsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin")
 */
class AdminSubscriptionController extends AbstractController
{
    private $entityManager;
    private $userSubscriptionRepository;

    public function __construct(EntityManagerInterface $entityManager, UserSubscriptionsRepository $userSubscriptionsRepository)
    {
        $this->entityManager = $entityManager;
        $this->userSubscriptionsRepository = $userSubscriptionsRepository;
    }

    /**
     * @Route("/subscription", name="admin_subscription_list")
     */
    public function listAdminSubscription(): Response
    {
        // Retrieve all UserSubscription entities from the database
        $userSubscriptions = $this->userSubscriptionRepository->findAll();

        return $this->render('adminsubscriptions/list.html.twig', [
            'userSubscriptions' => $userSubscriptions,
        ]);
    }

    /**
     * @Route("/subscriptions/create", name="admin_subscription_create")
     */
    public function createAdminSubscriptions(Request $request): Response
    {
        // Create a new UserSubscriptions entity
        $userSubscription = new UserSubscriptions();

        // Bind the UserSubscription entity to a form
        $form = $this->createForm(UserSubscriptionsType::class, $userSubscription);

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

    /**
     * @Route("/subscriptions/show/{id}", name="admin_subscription_show")
     */
    public function showAdminSubscriptions($id): Response
    {
        // Retrieve the UserSubscription entity from the database
        $userSubscription = $this->UserSubscriptionsRepository->find($id);

        return $this->render('adminsubscriptions/show.html.twig', [
            'userSubscriptions' => $userSubscription,
        ]);
    }

    /**
     * @Route("/subscriptions/update/{id}", name="admin_subscription_update")
     */
    public function updateAdminSubscriptions(Request $request, $id): Response
    {
        // Retrieve the UserSubscriptions entity from the database
        $userSubscription = $this->UserSubscriptionsRepository->find($id);

        // Bind the UserSubscriptions entity to a form
        $form = $this->createForm(UserSubscriptionsType::class, $userSubscription);

        // Handle the form submission
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Save the UserSubscription entity to the database
            $this->entityManager->persist($userSubscription);
            $this->entityManager->flush();

            return $this->redirectToRoute('admin_subscription_show', ['id' => $userSubscription->getId()]);
        }

        return $this->render('admin_subscription/update.html.twig', [
            'form' => $form->createView(),
            'userSubscription' => $userSubscription,
        ]);
    }

    /**
     * @Route("/subscription/delete/{id}", name="admin_subscription_delete")
     */
    public function deleteAdminSubscriptions($id): Response
    {
        // Retrieve the UserSubscription entity from the database
        $userSubscription = $this->UserSubscriptionsRepository->find($id);

        // Delete the UserSubscription entity from the database
        $this->entityManager->remove($userSubscription);
        $this->entityManager->flush();

        return $this->redirectToRoute('admin_subscription_list');
    }
}
