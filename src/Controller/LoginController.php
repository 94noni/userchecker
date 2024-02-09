<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/login', name: 'login', methods: ['get', 'post'])]
class LoginController extends AbstractController
{
    public function __invoke(UserRepository $userRepository): Response
    {
        return $this->render('login.html.twig', ['user' => $userRepository->findOneById(1)]);
    }
}
