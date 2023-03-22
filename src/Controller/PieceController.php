<?php

namespace App\Controller;

use App\Entity\Piece;
use App\Repository\PieceRepository;
use App\Repository\BuildingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class PieceController extends AbstractController
{


    /*###############  endpoint pour le nombre de personne d'une personne  ##################*/

    /**
     * @Route("/api/piece/{id}", name="api_personne_piece")
     */
    public function getNombrePersonne($id, PieceRepository $pieceRepository, SerializerInterface $serializer): JsonResponse {
        
        // recuperation de la piece correspondante à $id
        $piece = $pieceRepository->find($id);
        
        if ($piece != null) {
            // recuperation du nombre de personne et formatage en json
            $jsonPiece = $serializer->serialize($piece->getNombrePersonne(), 'json', ['groups' => 'getBuilding']);
           
            return new JsonResponse([
                'status-code' => Response::HTTP_OK,
                'datas' => $jsonPiece,
                'message' => 'piece trouvée',
                true
            ]);
        }
        
        return new JsonResponse([
            'status-code' => Response::HTTP_NOT_FOUND,
            'datas' => null,
            'message' => 'Aucune pièce ne correspond',
            true
        ]);
    }



    /*###############  endpoint pour le listing des pieces d'un buiding ##################*/

    /**
     * @Route("/api/piece-building/{id}", name="app_piece_building")
     */
    public function getallPieceToBuilding($id, PieceRepository $pieceRepository,BuildingRepository $buildingRepository, SerializerInterface $serializer): JsonResponse {
        
        // recherche du Building correspondant
        $building = $buildingRepository->find($id);

        // verification si le buiding existe en BD
        $building = $buildingRepository->find($id);

        // s'il n'existe pas on renvoit une reponse
        if($building == null){
            return new JsonResponse([
                'status' => Response::HTTP_NOT_FOUND,
                'datas' => $building,
                'message' => 'Building inexistant',
                true
            ]);
        }

        // Si le Building existe, on recuperation les pieces correspondantes à $id du building
        
        $id = $building->getId();
        $pieceList = $pieceRepository->findBy(array('building' => $id));
        
        $message = "";
        if (!empty($pieceList)) {
            $message = "pieces trouvées"; 
        }else {
            $message = "Aucune pieces pour le building";
        }

        // formatage en json de la liste des pièces et retour du resultat
        $jsonPieces = $serializer->serialize($pieceList, 'json', ['groups' => 'getBuilding']);
        
        return new JsonResponse([
            'status' => Response::HTTP_OK,
            'datas' => $jsonPieces,
            'message' => $message,
            true
        ]);
        
    }



        /**
     * @Route("/api/pieces", name="api_all_piece")
     */
    public function getAllPiece(PieceRepository $pieceRepository, SerializerInterface $serializer): JsonResponse
    {
        // recupération de la liste des Pieces en BD
        $listPiece = $pieceRepository->findAll();

        
        // Formatage des données pour le format json
        $jsonPieceList = $serializer->serialize($listPiece, 'json', ['groups' => 'getBuilding']);
        
        //return $this->json($jsonBuildingList);
        
        return new JsonResponse([
            'status' => Response::HTTP_OK,
            'datas' => $jsonPieceList,
            'message' => 'Pieces trouvées avec success',
            true
        ]);
        
    }
   
}
