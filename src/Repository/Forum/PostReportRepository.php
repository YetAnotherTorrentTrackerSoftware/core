<?php

namespace App\Repository\Forum;

use App\Entity\Forum\PostReport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PostReport|null find($id, $lockMode = null, $lockVersion = null)
 * @method PostReport|null findOneBy(array $criteria, array $orderBy = null)
 * @method PostReport[]    findAll()
 * @method PostReport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostReportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PostReport::class);
    }

    // /**
    //  * @return PostReport[] Returns an array of PostReport objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PostReport
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
