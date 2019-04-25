<?php

namespace App\Repository;

use App\Entity\QuantityUnit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method QuantityUnit|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuantityUnit|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuantityUnit[]    findAll()
 * @method QuantityUnit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuantityUnitRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, QuantityUnit::class);
    }

    // /**
    //  * @return QuantityUnit[] Returns an array of QuantityUnit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?QuantityUnit
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
