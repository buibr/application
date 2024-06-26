<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\User;
use App\Form\UserFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloController extends AbstractController
{
    #[Route('/hello')]
    public function index(Request $request): Response
    {
        $user = new User();
        $message = '';

        $form = $this->createForm(UserFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message = 'The form is valid';
        }

        return $this->render('hello.html.twig', [
            'name' => 'Burhan',
            'form' => $form,
            'message' => $message
        ]);
    }
}
