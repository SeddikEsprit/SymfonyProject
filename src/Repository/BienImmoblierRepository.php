<?php

namespace App\Repository;

use App\Entity\BienImmoblier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BienImmoblier|null find($id, $lockMode = null, $lockVersion = null)
 * @method BienImmoblier|null findOneBy(array $criteria, array $orderBy = null)
 * @method BienImmoblier[]    findAll()
 * @method BienImmoblier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BienImmoblierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BienImmoblier::class);
    }

    // /**
    //  * @return BienImmoblier[] Returns an array of BienImmoblier objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BienImmoblier
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
