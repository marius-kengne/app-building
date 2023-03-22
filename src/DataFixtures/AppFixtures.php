<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Piece;
use App\Entity\Organisation;
use App\Entity\Building;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        // nombre d'enregistrement a réalisé
        $n = 10;


        /**** Création des Organisations ***/

        $listOrganisation = [];
        for ($i = 0; $i < $n; $i++) {
            // Création de l'organisation elle-même.
            $organisation = new Organisation();
            $organisation->setNom("Organisation " . $i);
            // sauvegarde de l'organisation créée dans un tableau.
            $listOrganisation[] = $organisation;

            $manager->persist($organisation);
        }


        /**** Création des Buildings ***/

        $listBuilding = [];
        for ($i = 0; $i < $n; $i++) {
            // Création du building lui-même.
            $building = new Building();
            $building->setNom("Building " . $i);
            $building->setZipcode("zipcode " . $i);
            // On lie l'organisation à un building pris au hasard dans le tableau des organisations.
            $building->setOrganisation($listOrganisation[array_rand($listOrganisation)]);
            // sauvegarde du building créé dans un tableau.
            $listBuilding[] = $building;

            $manager->persist($building);
        }


        /**** Création des pieces ***/
        
        $listPiece = [];
        for ($i = 0; $i < $n; $i++) {
            // Création de la piece elle-même.
            $piece = new Piece();
            $piece->setNom("Piece " . $i);
            $piece->setNombrePersonne(rand($i, $n));
            // On lie le building à une piece au hasard dans le tableau des buildings.
            $piece->setBuilding($listBuilding[array_rand($listBuilding)]);

            $manager->persist($piece);
        }


        $manager->flush();
    }
}
