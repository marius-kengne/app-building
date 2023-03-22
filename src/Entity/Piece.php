<?php

namespace App\Entity;

use App\Repository\PieceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=PieceRepository::class)
 */
class Piece
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("getBuilding")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("getBuilding")
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     * @Groups("getBuilding")
     */
    private $nombre_personne;

    /**
     * @ORM\ManyToOne(targetEntity=Building::class, inversedBy="pieces")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("getBuilding")
     */
    private $building;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNombrePersonne(): ?int
    {
        return $this->nombre_personne;
    }

    public function setNombrePersonne(int $nombre_personne): self
    {
        $this->nombre_personne = $nombre_personne;

        return $this;
    }

    public function getBuilding(): ?Building
    {
        return $this->building;
    }

    public function setBuilding(?Building $building): self
    {
        $this->building = $building;

        return $this;
    }
}
