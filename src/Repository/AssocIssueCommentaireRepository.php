<?php

namespace App\Repository;

use App\Entity\AssocIssueCommentaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AssocIssueCommentaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method AssocIssueCommentaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method AssocIssueCommentaire[]    findAll()
 * @method AssocIssueCommentaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AssocIssueCommentaireRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AssocIssueCommentaire::class);
    }

    // /**
    //  * @return AssocIssueCommentaire[] Returns an array of AssocIssueCommentaire objects
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
    public function findOneBySomeField($value): ?AssocIssueCommentaire
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
