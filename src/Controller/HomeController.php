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
        $srcWhiteLogo = '../../assets/img/logo-white.png';

        return $this->render('home/index.html.twig', [
            'home_title' => $homeTitle,
            'superlist' => $superList,
            'srcWhiteLogoImg' => $srcWhiteLogo,
        ]);
    }
}
