<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function index()
    {
        $registerTitle = 'Register';

        return $this->render('register/index.html.twig', [
            'register_title' => $registerTitle,
        ]);
    }
}
