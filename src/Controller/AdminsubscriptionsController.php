<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminsubscriptionsController extends AbstractController
{
    #[Route('/adminsubscriptions', name: 'app_adminsubscriptions')]
    public function index(): Response
    {
        return $this->render('adminsubscriptions/index.html.twig', [
            'controller_name' => 'AdminsubscriptionsController',
        ]);
    }
}
