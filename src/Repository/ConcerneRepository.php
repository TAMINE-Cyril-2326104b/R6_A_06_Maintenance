<?php

namespace App\Repository;

use App\Entity\Concerne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Repository de l'entité Concerne.
 *
 * Permet d'effectuer des requêtes sur l'entité Concerne
 * via Doctrine.
 *
 * @extends ServiceEntityRepository<Concerne>
 */
class ConcerneRepository extends ServiceEntityRepository
{
    /**
     * Constructeur du repository Concerne.
     *
     * Associe l'entité Concerne au gestionnaire Doctrine.
     *
     * @param ManagerRegistry $registry le registre des managers Doctrine
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Concerne::class);
    }

//    /**
//     * @return Concerne[] Returns an array of Concerne objects
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

//    public function findOneBySomeField($value): ?Concerne
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
