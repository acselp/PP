<?php

namespace App\Entity;

use App\Repository\AgeRestrictionsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgeRestrictionsRepository::class)
 */
class AgeRestrictions
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $age_restriction;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAgeRestriction(): ?int
    {
        return $this->age_restriction;
    }

    public function setAgeRestriction(int $age): self
    {
        $this->age_restriction = $age;

        return $this;
    }
}
