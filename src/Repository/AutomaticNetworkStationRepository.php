<?php

namespace App\Repository;

use App\Entity\AutomaticNetworkStation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AutomaticNetworkStation|null find($id, $lockMode = null, $lockVersion = null)
 * @method AutomaticNetworkStation|null findOneBy(array $criteria, array $orderBy = null)
 * @method AutomaticNetworkStation[]    findAll()
 * @method AutomaticNetworkStation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AutomaticNetworkStationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AutomaticNetworkStation::class);
    }

    // /**
    //  * @return AutomaticNetworkStation[] Returns an array of AutomaticNetworkStation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AutomaticNetworkStation
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
