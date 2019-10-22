<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="Login")
     */
    public function index()
    {
        $loginTitle = 'Login';
        $superList = 'Superlist';

        return $this->render('login/index.html.twig', [
            'login_title' => $loginTitle,
            'superlist'=> $superList,
            'links' => array('Home', 'Lists', 'Admin', 'Contact', 'Login', 'Register'),
            'icons' => array('twitter', 'facebook', 'google-plus', 'linkedin', 'instagram'),
        ]);
    }
}
