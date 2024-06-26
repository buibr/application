<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloController extends AbstractController
{
    #[Route('/hello')]
    public function index(): Response
    {
        return $this->render('hello/index.html.twig', [
            'name' => 'Burhan',
        ]);
    }
}
