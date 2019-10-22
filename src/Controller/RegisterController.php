<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="Register")
     */
    public function index()
    {
        $registerTitle = 'Register';
        $superList = 'Superlist';

        return $this->render('register/index.html.twig', [
            'register_title' => $registerTitle,
            'superlist' => $superList,
            'links' => array('Home', 'Lists', 'Admin', 'Contact', 'Login', 'Register'),
            'icons' => array('twitter', 'facebook', 'google-plus', 'linkedin', 'instagram'),
        ]);
    }
}
