<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\EntityService;
use App\Repository\ExampleEntityRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EntityController extends AbstractController
{
    public function __construct(
        protected EntityService $es,
        protected ExampleEntityRepository $repository
    ) {
    }

    #[Route('/entity', name: 'entity.show', methods: ['GET'])]
    public function index(int $id): Response
    {
        $entity = $this->repository->getExampleEntity($id);

        return $this->json($entity);
    }

    #[Route('/entity', name: 'entity.create', methods: ['CREATE'])]
    public function create(Request $request): Response
    {
        $data = $request->request->all();
        $entity = $this->es->createExampleEntity($data);
        return $this->json($entity);
    }


    #[Route('/entity', name: 'entity.update', methods: ['PUT'])]
    public function update(Request $request, int $id): Response
    {
        $entity = $this->repository->getExampleEntity($id);

        if ($entity === null) {
            return $this->json(['message' => 'Entity not found'], 404);
        }

        $data = $request->request->all();

        $this->es->updateExampleEntity($entity, $data);

        return $this->json($entity);
    }

    #[Route('/entity', name: 'entity.delete', methods: ['DELETE'])]
    public function delete(int $id): Response
    {
        $entity = $this->repository->getExampleEntity($id);

        if ($entity === null) {
            return $this->json(['message' => 'Entity not found'], 404);
        }

        $this->es->deleteExampleEntity($entity);

        return $this->json(['id' => $id, 'message' => 'Entity deleted']);
    }
}
