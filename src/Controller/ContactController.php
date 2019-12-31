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
        $contact = 'Contact Us !';
        $superList = 'Superlist';

        return $this->render('contact/index.html.twig', [
            'contact_title' => $contact,
            'superlist' => $superList,
        ]);
    }
}
