<?php

namespace App\Repository;

use App\Entity\ExampleEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExampleEntity>
 */
class ExampleEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExampleEntity::class);
    }

    public function findById(int $id)
    {
        return $this->find($id);
    }

}
