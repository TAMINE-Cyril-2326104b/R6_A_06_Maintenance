<?php

namespace App\Repository;

use App\Entity\AppartientA;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Repository de l'entité AppartientA.
 *
 * Permet d'accéder aux données AppartientA en base de données.
 *
 * @extends ServiceEntityRepository<AppartientA>
 */
class AppartientARepository extends ServiceEntityRepository
{
    /**
     * Constructeur du repository AppartientA.
     *
     * Initialise le repository en liant l'entité AppartientA
     * au gestionnaire Doctrine.
     *
     * @param ManagerRegistry $registry le registre des managers Doctrine
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AppartientA::class);
    }

//    /**
//     * @return AppartientA[] Returns an array of AppartientA objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AppartientA
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
