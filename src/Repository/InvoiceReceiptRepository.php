<?php

namespace App\Repository;

use App\Entity\InvoiceReceipt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InvoiceReceiptRepository|null find($id, $lockMode = null, $lockVersion = null)
 * @method InvoiceReceiptRepository|null findOneBy(array $criteria, array $orderBy = null)
 * @method InvoiceReceiptRepository[]    findAll()
 * @method InvoiceReceiptRepository[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvoiceReceiptRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InvoiceReceipt::class);
    }

    // /**
    //  * @return BonDeReception[] Returns an array of BonDeReception objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BonDeReception
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
