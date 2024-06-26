<?php

namespace App\Service;

use App\Entity\ExampleEntity;

class EntityService
{


    public function __construct(
        private \Doctrine\ORM\EntityManagerInterface $em
    ) {
    }

    public function getExample(): string
    {
        return 'This is an example service';
    }

    // Create new entity and save
    public function createExampleEntity(array $data = []): ExampleEntity
    {
        $exampleEntity = new ExampleEntity();

        foreach ($data as $key => $value) {
            $setter = 'set' . ucfirst($key);
            if (method_exists($exampleEntity, $setter)) {
                $exampleEntity->$setter($value);
            }
        }

        $this->em->persist($exampleEntity);
        $this->em->flush();

        return $exampleEntity;
    }

    public function updateExampleEntity(ExampleEntity $entity, array $data): void
    {
        foreach ($data as $key => $value) {
            $setter = 'set' . ucfirst($key);
            if (method_exists($entity, $setter)) {
                $entity->$setter($value);
            }
        }

        $this->em->persist($entity);
        $this->em->flush();
    }

    public function deleteExampleEntity(ExampleEntity $entity) : bool
    {
        $this->em->remove($entity);
        $this->em->flush();
        return true;
    }
}
