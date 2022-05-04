<?php

namespace App\Repository;

use App\Entity\AgeRestrictions;
use App\Entity\Genre;
use App\Entity\Movies;
use App\Entity\Quality;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Movies>
 *
 * @method Movies|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movies|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movies[]    findAll()
 * @method Movies[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MoviesRepository extends ServiceEntityRepository
{
    private $em;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $em)
    {
        parent::__construct($registry, Movies::class);
        $this->em = $em;
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Movies $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Movies $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function getAll(): array
    {
        return $this->createQueryBuilder('g')
            ->select('g.title', 'g.id', 'g.active')
            ->where('g.active = 1')
            ->getQuery()
            ->execute();
    }

    public function getAllWithJoin(): array
    {
        $movies = $this->createQueryBuilder('m')

            ->innerJoin(Genre::class, 'g', 'WITH', 'm.genre_id = g.id')
            ->select('m, g.id, g.title, g.active')
            ->getQuery()
            ->getArrayResult();

//        $res = array();
//
//        for ($i = 0; $i < sizeof($movies); $i += 2) {
//            $res[] = array_merge($movies[$i], $movies[$i + 1]);
//        }
        //dd($movies);
        return $movies;
    }

    public function getOneWithJoin($id): array
    {
        $movies = $this->createQueryBuilder('m')

            ->innerJoin(Genre::class, 'g', 'WITH', 'm.genre_id = g.id')
            ->innerJoin(Quality::class, 'q', 'WITH', 'm.quality = q.id')
            ->innerJoin(AgeRestrictions::class, 'a', 'WITH', 'm.age_restriction = a.id')
            ->select('m, q, a, g')
            ->where('m.active = 1 AND m.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getScalarResult();

//        $res = array();
//
//        for ($i = 0; $i < sizeof($movies); $i += 2) {
//            $res[] = array_merge($movies[$i], $movies[$i + 1]);
//        }
        //dd($movies);
        return $movies;
    }

    // /**
    //  * @return Movies[] Returns an array of Movies objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Movies
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
