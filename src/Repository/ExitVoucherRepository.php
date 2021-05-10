<?php

namespace App\Repository;

use App\Entity\ExitVoucher;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ExitVoucher|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExitVoucher|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExitVoucher[]    findAll()
 * @method ExitVoucher[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExitVoucherRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExitVoucher::class);
    }

    // /**
    //  * @return ExitVoucher[] Returns an array of ExitVoucher objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ExitVoucher
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
