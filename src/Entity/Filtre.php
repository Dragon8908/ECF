<?php

namespace App\Entity;

use App\Repository\FiltreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FiltreRepository::class)]
class Filtre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    public ?int $prixmin = null;

    #[ORM\Column]
    public ?int $prixmax = null;

    #[ORM\Column]
    public ?int $anneemin = null;

    #[ORM\Column]
    public ?int $anneemax = null;

    #[ORM\Column]
    public ?int $kmmin = null;

    #[ORM\Column]
    public ?int $kmmax = null;

    #[ORM\Column]
    public ?int $page = 1;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixmin(): ?int
    {
        return $this->prixmin;
    }

    public function setPrixmin(int $prixmin): self
    {
        $this->prixmin = $prixmin;

        return $this;
    }

    public function getPrixmax(): ?int
    {
        return $this->prixmax;
    }

    public function setPrixmax(int $prixmax): self
    {
        $this->prixmax = $prixmax;

        return $this;
    }

    public function getAnneemin(): ?int
    {
        return $this->anneemin;
    }

    public function setAnneemin(int $anneemin): self
    {
        $this->anneemin = $anneemin;

        return $this;
    }

    public function getAnneemax(): ?int
    {
        return $this->anneemax;
    }

    public function setAnneemax(int $anneemax): self
    {
        $this->anneemax = $anneemax;

        return $this;
    }

    public function getKmmin(): ?int
    {
        return $this->kmmin;
    }

    public function setKmmin(int $kmmin): self
    {
        $this->kmmin = $kmmin;

        return $this;
    }

    public function getKmmax(): ?int
    {
        return $this->kmmax;
    }

    public function setKmmax(int $kmmax): self
    {
        $this->kmmax = $kmmax;

        return $this;
    }

    public function getPage(): ?int
    {
        return $this->page;
    }

    public function setPage(int $page): self
    {
        $this->page = $page;

        return $this;
    }
}
