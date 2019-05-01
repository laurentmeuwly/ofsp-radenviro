<?php

namespace App\Repository;

use App\Entity\Isotope;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Isotope|null find($id, $lockMode = null, $lockVersion = null)
 * @method Isotope|null findOneBy(array $criteria, array $orderBy = null)
 * @method Isotope[]    findAll()
 * @method Isotope[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IsotopeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Isotope::class);
    }

    // /**
    //  * @return Isotope[] Returns an array of Isotope objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Isotope
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
