<?php

namespace App\Repository;

use App\Entity\Internaute;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Internaute|null find($id, $lockMode = null, $lockVersion = null)
 * @method Internaute|null findOneBy(array $criteria, array $orderBy = null)
 * @method Internaute[]    findAll()
 * @method Internaute[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InternauteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Internaute::class);
    }

    // /**
    //  * @return Internaute[] Returns an array of Internaute objects
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
    public function findOneBySomeField($value): ?Internaute
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
