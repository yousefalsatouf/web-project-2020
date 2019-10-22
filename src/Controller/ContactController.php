<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="Contact")
     */
    public function index()
    {
        $contact = 'Contact';
        $superlist = 'Superlist';

        return $this->render('contact/index.html.twig', [
            'contact_title' => $contact,
            'superlist' => $superlist,
            'links' => array('Home', 'Lists', 'Admin', 'Contact', 'Login', 'Register'),
            'icons' => array('twitter', 'facebook', 'google-plus', 'linkedin', 'instagram'),
        ]);
    }
}
