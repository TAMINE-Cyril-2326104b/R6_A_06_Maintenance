<?php

namespace App\Repository;

use App\Entity\Championnat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Repository de l'entité Championnat.
 *
 * Permet d'effectuer des requêtes sur l'entité Championnat
 * via Doctrine.
 *
 * @extends ServiceEntityRepository<Championnat>
 */
class ChampionnatRepository extends ServiceEntityRepository
{
    /**
     * Constructeur du repository Championnat.
     *
     * Associe l'entité Championnat au gestionnaire Doctrine.
     *
     * @param ManagerRegistry $registry le registre des managers Doctrine
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Championnat::class);
    }

//    /**
//     * @return Championnat[] Returns an array of Championnat objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Championnat
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
