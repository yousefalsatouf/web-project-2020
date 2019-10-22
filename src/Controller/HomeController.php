<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="Home")
     */
    public function index()
    {
        $homeTitle = 'Superlist - Directory Template';
        $superList = 'Superlist';
        return $this->render('home/index.html.twig', [
            'home_title' => $homeTitle,
            'superlist' => $superList,
            'links' => array('Home', 'Lists', 'Admin', 'Contact', 'Login', 'Register'),
            'icons' => array('twitter', 'facebook', 'google-plus', 'linkedin', 'instagram'),
        ]);
    }
}
