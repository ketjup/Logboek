<?php

namespace App\Repository;

use App\Entity\Logboek;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Logboek|null find($id, $lockMode = null, $lockVersion = null)
 * @method Logboek|null findOneBy(array $criteria, array $orderBy = null)
 * @method Logboek[]    findAll()
 * @method Logboek[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogboekRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Logboek::class);
    }

    // /**
    //  * @return Logboek[] Returns an array of Logboek objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Logboek
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
