<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/anonymous', name: 'anonymous', methods: ['get'])]
class AnonymousController extends AbstractController
{
    public function __invoke(UserRepository $userRepository, Security $security): Response
    {
        $user = $userRepository->findOneById(1);

        dump($user);

        // --- /!\ ---
        //
        // both lines should throw!
        //
        // user::enabled = 0
        // and
        // App\Security\UserChecker::checkPreAuth checks it
        //
        // --- /!\ ---

        $security->login($user, 'form_login');
        // $security->login($user, 'form_login', 'main');

        return $this->redirectToRoute('private');
    }
}
