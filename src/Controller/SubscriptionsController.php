<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SubscriptionsController extends AbstractController
{
    #[Route('/subscriptions', name: 'app_subscriptions')]
    public function index(): Response
    {
        return $this->render('subscriptions/index.html.twig', [
            'controller_name' => 'SubscriptionsController',
        ]);
    }
}
