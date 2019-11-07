<?php

namespace App\Controller;

use App\Entity\CategorieDeServices;
use App\Entity\Prestataire;
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

        $category = $this->getDoctrine()->getRepository(CategorieDeServices::class);
        $categories = $category->findAll();

        $recipient = $this->getDoctrine()->getRepository(Prestataire::class);
        $recipients = $recipient->findAll();

        return $this->render('home/index.html.twig', [
            'cats' => $categories,
            'recipients' => $recipients,
            'home_title' => $homeTitle,
            'superlist' => $superList,
            'links' => array('Home', 'Lists', 'Admin', 'Contact', 'Login', 'Register'),
            'icons' => array('twitter', 'facebook', 'google-plus', 'linkedin', 'instagram'),
        ]);
    }
}
