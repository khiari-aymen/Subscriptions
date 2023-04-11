<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoyaltpointshistoryController extends AbstractController
{
    #[Route('/loyaltpointshistory', name: 'app_loyaltpointshistory')]
    public function index(): Response
    {
        return $this->render('loyaltpointshistory/index.html.twig', [
            'controller_name' => 'LoyaltpointshistoryController',
        ]);
    }
}
