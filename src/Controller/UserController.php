<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user/login", name="Login")
     */
    public function login()
    {
        $loginTitle = 'Login';
        $superList = 'Superlist';

        return $this->render('user/login.html.twig', [
            'login_title' => $loginTitle,
            'superlist'=> $superList,
            'links' => array('Home', 'Lists', 'Admin', 'Contact', 'Login', 'Register'),
            'icons' => array('twitter', 'facebook', 'google-plus', 'linkedin', 'instagram'),
        ]);
    }

    /**
     * @Route("/user/register", name="Register")
     */
    public function register()
    {
        $registerTitle = 'Register';
        $superList = 'Superlist';

        return $this->render('user/register.html.twig', [
            'register_title' => $registerTitle,
            'superlist' => $superList,
            'links' => array('Home', 'Lists', 'Admin', 'Contact', 'Login', 'Register'),
            'icons' => array('twitter', 'facebook', 'google-plus', 'linkedin', 'instagram'),
        ]);
    }
}
