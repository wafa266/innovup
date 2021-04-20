<?php


namespace App\Repository;


use App\Entity\CustomerOrders;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


    /**
     * @method CustomerOrders|null find($id, $lockMode = null, $lockVersion = null)
     * @method CustomerOrders|null findOneBy(array $criteria, array $orderBy = null)
     * @method CustomerOrders[]    findAll()
     * @method CustomerOrders[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
     */
    class CustomerOrdersRepository extends ServiceEntityRepository

{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CustomerOrders::class);
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
    public  function  countAllCustomerOrders(){
        $queryBuilder=$this->createQueryBuilder('a');
        $queryBuilder->select('COUNT(a.id) as value');

        return  $queryBuilder->getQuery()->getOneOrNullResult();
    }



}