<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/toggle', name: 'toggle', methods: ['get'])]
class ToggleController extends AbstractController
{
    public function __invoke(UserRepository $userRepository, EntityManagerInterface $entityManager): Response
    {
        /** @var User $user */
        $user = $userRepository->findOneById(1);

        $user->setEnabled(!$user->isEnabled());
        $entityManager->flush();

        return $this->redirectToRoute('login');
    }
}
