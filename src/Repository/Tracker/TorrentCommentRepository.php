<?php

namespace App\Repository\Tracker;

use App\Entity\Tracker\TorrentComment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TorrentComment|null find($id, $lockMode = null, $lockVersion = null)
 * @method TorrentComment|null findOneBy(array $criteria, array $orderBy = null)
 * @method TorrentComment[]    findAll()
 * @method TorrentComment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TorrentCommentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TorrentComment::class);
    }

    // /**
    //  * @return TorrentComment[] Returns an array of TorrentComment objects
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
    public function findOneBySomeField($value): ?TorrentComment
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
