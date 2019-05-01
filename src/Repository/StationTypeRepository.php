<?php

namespace App\Repository;

use App\Entity\StationType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StationType|null find($id, $lockMode = null, $lockVersion = null)
 * @method StationType|null findOneBy(array $criteria, array $orderBy = null)
 * @method StationType[]    findAll()
 * @method StationType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StationTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StationType::class);
    }

    // /**
    //  * @return StationType[] Returns an array of StationType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StationType
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
