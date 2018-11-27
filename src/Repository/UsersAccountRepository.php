<?php

namespace App\Repository;

use App\Entity\UsersAccount;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UsersAccount|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsersAccount|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsersAccount[]    findAll()
 * @method UsersAccount[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersAccountRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UsersAccount::class);
    }

    // /**
    //  * @return UsersAccount[] Returns an array of UsersAccount objects
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
    public function findOneBySomeField($value): ?Users
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
