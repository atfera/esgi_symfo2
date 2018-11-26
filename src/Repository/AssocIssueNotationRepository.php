<?php

namespace App\Repository;

use App\Entity\AssocIssueNotation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AssocIssueNotation|null find($id, $lockMode = null, $lockVersion = null)
 * @method AssocIssueNotation|null findOneBy(array $criteria, array $orderBy = null)
 * @method AssocIssueNotation[]    findAll()
 * @method AssocIssueNotation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AssocIssueNotationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AssocIssueNotation::class);
    }

    // /**
    //  * @return AssocIssueNotation[] Returns an array of AssocIssueNotation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AssocIssueNotation
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
