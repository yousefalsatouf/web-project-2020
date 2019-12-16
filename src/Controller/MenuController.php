<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MenuController extends AbstractController
{

    public function menu()
    {
        $menu = array('Home'=>'Home', 'Lists'=>'Listing', 'Admin'=>'Admin', 'Contact'=>'Contact', 'Login'=>'app_login', 'Register'=>'Register');
        $icons = array('twitter', 'facebook', 'google-plus', 'linkedin', 'instagram');

        return $this->render('helpers/_menu-list.html.twig', [
            'menu' => $menu,
            'icons' => $icons,
        ]);
    }
}
