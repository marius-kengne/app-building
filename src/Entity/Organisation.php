<?php

namespace App\Entity;

use App\Repository\OrganisationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=OrganisationRepository::class)
 */
class Organisation
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
     * @ORM\OneToMany(targetEntity=Building::class, mappedBy="organisation")
     */
    private $building;

    public function __construct()
    {
        $this->building = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Building>
     */
    public function getBuilding(): Collection
    {
        return $this->building;
    }

    public function addBuilding(Building $building): self
    {
        if (!$this->building->contains($building)) {
            $this->building[] = $building;
            $building->setOrganisation($this);
        }

        return $this;
    }

    public function removeBuilding(Building $building): self
    {
        if ($this->building->removeElement($building)) {
            // set the owning side to null (unless already changed)
            if ($building->getOrganisation() === $this) {
                $building->setOrganisation(null);
            }
        }

        return $this;
    }
}
