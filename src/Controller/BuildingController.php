<?php

namespace App\Controller;

use App\Entity\Building;
use App\Repository\BuildingRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class BuildingController extends AbstractController
{

    /*################  endpoint pour le listing de tous les buidings #####################*/

    /**
     * @Route("/api/building", name="api_building")
     */
    public function getAllBuilding(BuildingRepository $buildingRepository, SerializerInterface $serializer): JsonResponse
    {
        // recupération de la liste des Building en BD
        $listBuilding = $buildingRepository->findAll();

        
        // Formatage des données pour le format json
        $jsonBuildingList = $serializer->serialize($listBuilding, JsonEncoder::FORMAT, ['groups' => 'getBuilding']);
        
        //return $this->json($jsonBuildingList);
        
        return new JsonResponse([
            'status' => Response::HTTP_OK,
            'datas' => $jsonBuildingList,
            'message' => 'Buildings trouvés avec success',
            true
        ]);
        
    }
    


    /*###############  endpoint pour les informations détaillées d'un buiding ##################*/

    /**
     * @Route("/api/building/{id}", name="api_getbuilding, methods: ['GET']")
     */
    public function getDetailBuilding($id, BuildingRepository $buildingRepository, SerializerInterface $serializer): JsonResponse {
        
        $building = $buildingRepository->find($id);
        
        if ($building != null) {
            $jsonBuilding = $serializer->serialize($building, 'json', ['groups' => 'getBuilding']);
            return new JsonResponse([
                'status-code' => Response::HTTP_OK,
                'datas' => $jsonBuilding,
                'message' => 'Building trouvé avec success',
                true
            ]);
        }
        
        return new JsonResponse([
            'status-code' => Response::HTTP_NOT_FOUND,
            'datas' => $building,
            'message' => 'Auncun Building trouvés',
            true
        ]);
   }

}
