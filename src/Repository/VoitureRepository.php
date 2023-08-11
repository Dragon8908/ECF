<?php

namespace App\Repository;

use App\Entity\Voiture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Voiture>
 *
 * @method Voiture|null find($id, $lockMode = null, $lockVersion = null)
 * @method Voiture|null findOneBy(array $criteria, array $orderBy = null)
 * @method Voiture[]    findAll()
 * @method Voiture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoitureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Voiture::class);
    }

    public function save(Voiture $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Voiture $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findBySearch($search): array
    {
        return $this->createQueryBuilder('voiture')
            ->andWhere('voiture.nom LIKE :search')
            ->setParameter('search', '%'.$search.'%')
            ->orderBy('voiture.annee', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByRange($minPrice, $maxPrice, $minKm, $maxKm, $minYear, $maxYear): array
    {
        return $this->createQueryBuilder('voiture')
            ->andWhere('voiture.prix BETWEEN :minPrice AND :maxPrice
                    AND voiture.km BETWEEN :minKm AND :maxKm
                    AND voiture.annee BETWEEN :minYear AND :maxYear')
            ->setParameter('minPrice', $minPrice)
            ->setParameter('maxPrice', $maxPrice)
            ->setParameter('minKm', $minKm)
            ->setParameter('maxKm', $maxKm)
            ->setParameter('minYear', $minYear)
            ->setParameter('maxYear', $maxYear)
            ->orderBy('voiture.annee', 'DESC')
            ->getQuery()
            ->getArrayResult()
        ;
    }

//    /**
//     * @return Voiture[] Returns an array of Voiture objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Voiture
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
