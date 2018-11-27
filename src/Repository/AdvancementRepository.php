<?php

namespace App\Repository;

use App\Entity\Advancement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Advancement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Advancement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Advancement[]    findAll()
 * @method Advancement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdvancementRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Advancement::class);
    }

    // /**
    //  * @return Advancement[] Returns an array of Advancement objects
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
    public function findOneBySomeField($value): ?Advancement
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
