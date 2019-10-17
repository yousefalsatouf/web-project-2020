<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $homeTitle = 'Superlist - Directory Template';
        $superList = 'Superlist';

        $headerList = array('Home', 'Listing', 'Pages', 'Blog', 'Admin', 'Contact');

        return $this->render('home/index.html.twig', [
            'home_title' => $homeTitle,
            'superlist' => $superList,
            'list' => $headerList,
        ]);
    }
}
