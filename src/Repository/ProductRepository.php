<?php
namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
* @method Product|null find($id, $lockMode = null, $lockVersion = null)
* @method Product|null findOneBy(array $criteria, array $orderBy = null)
* @method Product[]    findAll()
* @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
*/
class ProductRepository extends ServiceEntityRepository
{
public function __construct(ManagerRegistry $registry)
{
parent::__construct($registry, Product::class);
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
}
*/

    /**
     * @return int|mixed|string|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public  function  CountAllProduct(){
        $queryBuilder=$this->createQueryBuilder('a');
        $queryBuilder->select('COUNT(a.id) as value');

        return  $queryBuilder->getQuery()->getOneOrNullResult();
    }
  
}
