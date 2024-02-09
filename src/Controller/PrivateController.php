<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

#[Route('/private', name: 'private', methods: ['get'])]
class PrivateController extends AbstractController
{
    public function __invoke(#[CurrentUser] User $user): Response
    {
        return $this->render('private.html.twig', ['user' => $user]);
    }
}
