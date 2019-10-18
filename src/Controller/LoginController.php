<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function index()
    {
        $loginTitle = 'Login';

        return $this->render('login/index.html.twig', [
            'login_title' => $loginTitle,
        ]);
    }
}
