<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FilmRepository::class)
 */
class Film
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
    * @ORM\Column(type="string", length=255)
    * @Assert\Length(min=1, max=255,
    *               exactMessage="Votre titre doit faire {{ limit }} caractères max")
    */
    private $titre;

    /**
     * @ORM\Column(type="integer")
     * @Assert\LessThanOrEqual(value = 1000,
     *                          message="la valeur doit être <= {{ compared_value }}")
     * @Assert\GreaterThanOrEqual(value = 1,
     *                          message="la valeur doit être >= {{ compared_value }}")
     */
    private $duree;

    /**
     * @ORM\Column(type="date")
     * @Assert\Date
     */
    private $dateSortie;

    /**
     * @ORM\Column(type="integer")
     * @Assert\LessThanOrEqual(value = 20,
     *                          message="la valeur doit être <= {{ compared_value }}")
     * @Assert\GreaterThanOrEqual(value = 0,
     *                          message="la valeur doit être >= {{ compared_value }}")
     */
    private $note;

    /**
     * @ORM\Column(type="integer")
     * @Assert\LessThanOrEqual(value = 120,
     *                          message="la valeur doit être <= {{ compared_value }}")
     * @Assert\GreaterThanOrEqual(value = 0,
     *                          message="la valeur doit être >= {{ compared_value }}")
     */
    private $ageMinimal;

    /**
     * @ORM\ManyToMany(targetEntity=Acteur::class, inversedBy="films")
     */
    private $acteurs;

    /**
     * @ORM\ManyToOne(targetEntity=Genre::class, inversedBy="films")
     */
    private $genre;

    public function __construct()
    {
        $this->acteurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->dateSortie;
    }

    public function setDateSortie(\DateTimeInterface $dateSortie): self
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getAgeMinimal(): ?int
    {
        return $this->ageMinimal;
    }

    public function setAgeMinimal(int $ageMinimal): self
    {
        $this->ageMinimal = $ageMinimal;

        return $this;
    }

    /**
     * @return Collection|acteur[]
     */
    public function getActeurs(): Collection
    {
        return $this->acteurs;
    }

    public function addActeur(acteur $acteur): self
    {
        if (!$this->acteurs->contains($acteur)) {
            $this->acteurs[] = $acteur;
        }

        return $this;
    }

    public function removeActeur(acteur $acteur): self
    {
        $this->acteurs->removeElement($acteur);

        return $this;
    }

    public function getGenre(): ?Genre
    {
        return $this->genre;
    }

    public function setGenre(?Genre $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function __toString(): ?string
    {
        return $this->titre;
    }
}
