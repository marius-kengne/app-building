<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BuildingRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(BuildingRepository $buildingRepository): Response
    {

        return $this->render('home/index.html.twig', [
            'controller_name' => 'Listing des Buildings',
        ]);
    }

    /**
     * @Route("/detail-building/{id}", name="/details-building/")
     */
    public function detail($id, BuildingRepository $buildingRepository): Response
    {
      
        return $this->render('home/details-building.html.twig', [
            'controller_name' => 'Informations du Building',
        ]);
    }

}
