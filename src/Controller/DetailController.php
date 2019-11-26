<?php

namespace App\Controller;

use App\Entity\Prestataire;
use App\Repository\PrestataireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DetailController extends AbstractController
{
    /**
     * @Route("/detail/{id}", name="detail")
     */
    public function index(Prestataire $recipient, PrestataireRepository $repo)
    {
        $recipient = $repo->find($recipient);

        return $this->render('detail/index.html.twig', [
            'recipient' => $recipient,
            'detail_name' => 'Detail',
            'superlist' => 'Superlist',
            'links' => array('Home', 'Lists', 'Admin', 'Contact', 'Login', 'Register'),
            'icons' => array('twitter', 'facebook', 'google-plus', 'linkedin', 'instagram'),

        ]);
    }
}