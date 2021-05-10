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
        $em = $registry->getManager();

        $emConfig = $em->getConfiguration();
        $emConfig->addCustomDatetimeFunction('YEAR', 'DoctrineExtensions\Query\Mysql\Year');
        $emConfig->addCustomDatetimeFunction('MONTH', 'DoctrineExtensions\Query\Mysql\Month');
    }

    /**
     * @return int|mixed|string|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public  function  countAllCustomerOrders(){
        $queryBuilder=$this->createQueryBuilder('a');
        $queryBuilder->select('COUNT(a.id) as value');

        return  $queryBuilder->getQuery()->getOneOrNullResult();
    }

    /**
     * @return int|mixed|string|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public  function  maxCustomerOrders()
    {
        $customerOrder = 0;
        $queryBuilder=$this->createQueryBuilder('a');
        $queryBuilder->select('count(a.id)', 'a')
            ->groupBy('a.customer')
            ->orderBy('count(a.id)', 'DESC')
            ;
        $data = $queryBuilder->getQuery()->getResult();
        $max = 0;
        foreach($data as $key => $value) {
            if($value['1'] > $max) {
                $max = $value['1'];
                $customerOrder = $value['0'];
            }
        }

        return $customerOrder;

    }

        /**
         * Get Customer orders by month
         */
        public function monthCustomerOrders()
        {
            $queryBuilder = $this->createQueryBuilder('a');
            $queryBuilder->select('YEAR(a.createdAt) as year' , 'MONTH(a.createdAt) as month', 'count(a.id) as val')
                ->groupBy('year')
                ->addGroupBy('month')
                ->orderBy('count(a.id)', 'DESC');

            return $queryBuilder->getQuery()->getResult();
        }














    }