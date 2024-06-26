<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\ExampleService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExampleController extends AbstractController
{
    public function __construct(
        protected ExampleService $exampleService
    ) {
    }

    #[Route('/example')]
    public function index(): Response
    {
        return $this->render('example.html.twig', [
            'example' => $this->exampleService->getExample()
        ]);
    }
}
