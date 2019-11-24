<?php

namespace App\Controller;

use App\Entity\Prestataire;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListsController extends AbstractController
{
    /**
     * @Route("/lists", name="Lists")
     */
    public function index()
    {
        $recipient = $this->getDoctrine()->getRepository(Prestataire::class);
        $recipients = $recipient->findAll();
        return $this->render('lists/index.html.twig', [
            'recipients' => $recipients,
            'lists_title' => 'Lists',
            'superlist' => 'Superlist',
            'links' => array('Home', 'Lists', 'Admin', 'Contact', 'Login', 'Register'),
            'icons' => array('twitter', 'facebook', 'google-plus', 'linkedin', 'instagram'),
        ]);
    }
}
