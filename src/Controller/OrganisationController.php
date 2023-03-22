<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\OrganisationRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class OrganisationController extends AbstractController
{
    /**
     * @Route("/api/organisation", name="app_organisation")
     */
    public function getAllOrganisation(OrganisationRepository $organisationRepository, SerializerInterface $serializer): JsonResponse
    {
        // recupération de la liste des Organisations en BD
        $listOrganisation = $organisationRepository->findAll();

        // Formatage des données pour le format json
        $jsonOrganisationList = $serializer->serialize($listOrganisation, 'json', ['groups' => 'getBuilding']);
        
        return new JsonResponse([
            'status' => Response::HTTP_OK,
            'datas' => $jsonOrganisationList,
            'message' => 'Organisations trouvées avec success',
            true
        ]);
    }
}
