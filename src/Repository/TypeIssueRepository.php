<?php

namespace App\Repository;

use App\Entity\TypeIssue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeIssue|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeIssue|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeIssue[]    findAll()
 * @method TypeIssue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeIssueRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeIssue::class);
    }

    // /**
    //  * @return TypeIssue[] Returns an array of TypeIssue objects
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
    public function findOneBySomeField($value): ?TypeIssue
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
