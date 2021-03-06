<?php

namespace App\Repository;

use App\Entity\Clown;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Clown>
 *
 * @method Clown|null find($id, $lockMode = null, $lockVersion = null)
 * @method Clown|null findOneBy(array $criteria, array $orderBy = null)
 * @method Clown[]    findAll()
 * @method Clown[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClownRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Clown::class);
    }

    public function add(Clown $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Clown $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getBuddy($id)
    {  
        $this->getSingleClown($id);
         
        if ($this->homme == 1) {
           $sex = 0;
        }else{
            $sex=1;
        };
        if ($this->musicien == 1) {
            $mus=0;
         }else{
             $mus=1;
         };



        $stmt = $this->conn->prepare("SELECT
        *
    FROM
        $this->db_table
    WHERE 
       homme = :sex and
        musicien = :mus"    
    );
      

        $stmt->execute([
            ":sex"=>$sex,
            ":mus"=>$mus,
        ]);

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $dataRow['id'];
        $this->pseudo = $dataRow['pseudo'];
        $this->actif = $dataRow['actif'];
        $this->sexeHomme = $dataRow['sexeHomme'];
        $this->musicien = $dataRow['musicien'];
        $this->couleur = $dataRow['couleur'];
        
    }

//    /**
//     * @return Clown[] Returns an array of Clown objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Clown
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
