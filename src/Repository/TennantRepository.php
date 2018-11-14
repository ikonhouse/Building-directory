<?php

namespace App\Repository;

use App\Entity\Tennant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Tennant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tennant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tennant[]    findAll()
 * @method Tennant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TennantRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tennant::class);
    }

    // /**
    //  * @return Tennant[] Returns an array of Tennant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tennant
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */


}
