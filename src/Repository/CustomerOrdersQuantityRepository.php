<?php
namespace App\Repository;


use App\Entity\CustomerOrdersQuantity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;



/**
 * @method CustomerOrdersQuantity|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomerOrdersQuantity|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomerOrdersQuantity[]    findAll()
 * @method CustomerOrdersQuantity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomerOrdersQuantityRepository  extends ServiceEntityRepository

{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CustomerOrdersQuantity::class);
    }

// /**
//  * @return User[] Returns an array of User objects
//  */
    /*
    public function findByExampleField($value)
    {
    return $this->createQueryBuilder('u')
    ->andWhere('u.exampleField = :val')
    ->setParameter('val', $value)
    ->orderBy('u.id', 'ASC')
    ->setMaxResults(10)
    ->getQuery()
    ->getResult()
    ;
    }
    */

    /*
    public function findOneBySomeField($value): ?User
    {
    return $this->createQueryBuilder('u')
    ->andWhere('u.exampleField = :val')
    ->setParameter('val', $value)
    ->getQuery()
    ->getOneOrNullResult()
    ;
    }*/

    /**
     * @return int|mixed|string|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public  function  maxCustomerOrdersProduct()
    {
        $product = 0;
        $queryBuilder=$this->createQueryBuilder('a');
        $queryBuilder->select('count(a.id)', 'a')
            ->groupBy('a.product')
            ->orderBy('count(a.id)', 'DESC')
        ;
        $data = $queryBuilder->getQuery()->getResult();
        $max = 0;
        foreach($data as $key => $value) {
            if($value['1'] > $max) {
                $max = $value['1'];
                $product = $value['0'];
            }
        }

        return $product;

    }





    }
