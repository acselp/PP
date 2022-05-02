<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MovieGenre
 *
 * @ORM\Table(name="movie_genre", indexes={@ORM\Index(name="movies_contr", columns={"id_movie"}), @ORM\Index(name="genre_constr", columns={"id_genre"})})
 * @ORM\Entity
 */
class MovieGenre
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
     * @var \Movies
     *
     * @ORM\ManyToOne(targetEntity="Movies")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_movie", referencedColumnName="id")
     * })
     */
    private $idMovie;

    /**
     * @var \Genre
     *
     * @ORM\ManyToOne(targetEntity="Genre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_genre", referencedColumnName="id")
     * })
     */
    private $idGenre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdMovie(): ?Movies
    {
        return $this->idMovie;
    }

    public function setIdMovie(?Movies $idMovie): self
    {
        $this->idMovie = $idMovie;

        return $this;
    }

    public function getIdGenre(): ?Genre
    {
        return $this->idGenre;
    }

    public function setIdGenre(?Genre $idGenre): self
    {
        $this->idGenre = $idGenre;

        return $this;
    }


}
