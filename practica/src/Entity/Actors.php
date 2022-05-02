<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Actors
 *
 * @ORM\Table(name="actors")
 * @ORM\Entity
 */
class Actors
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="fname", type="string", length=255, nullable=false)
     */
    private $fname;

    /**
     * @var string
     *
     * @ORM\Column(name="lname", type="string", length=255, nullable=false)
     */
    private $lname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birth", type="date", nullable=false)
     */
    private $birth;

    /**
     * @var string
     *
     * @ORM\Column(name="biography", type="string", length=255, nullable=false)
     */
    private $biography;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFname(): ?string
    {
        return $this->fname;
    }

    public function setFname(string $fname): self
    {
        $this->fname = $fname;

        return $this;
    }

    public function getLname(): ?string
    {
        return $this->lname;
    }

    public function setLname(string $lname): self
    {
        $this->lname = $lname;

        return $this;
    }

    public function getBirth(): ?\DateTimeInterface
    {
        return $this->birth;
    }

    public function setBirth(\DateTimeInterface $birth): self
    {
        $this->birth = $birth;

        return $this;
    }

    public function getBiography(): ?string
    {
        return $this->biography;
    }

    public function setBiography(string $biography): self
    {
        $this->biography = $biography;

        return $this;
    }


}
