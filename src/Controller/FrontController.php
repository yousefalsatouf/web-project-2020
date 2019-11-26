<?php

namespace App\Controller;

use App\Entity\CategorieDeServices;
use App\Entity\Prestataire;
use App\Repository\PrestataireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
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
        $recipients = $recipient->findFour(4);

        return $this->render('front/index.html.twig', [
            'cats' => $categories,
            'recipients' => $recipients,
            'home_title' => $homeTitle,
            'superlist' => $superList,
            'links' => array('Home', 'Listing', 'Admin', 'Contact', 'Login', 'Register'),
            'icons' => array('twitter', 'facebook', 'google-plus', 'linkedin', 'instagram'),
        ]);
    }

    /**
     * @Route("/recipients", name="Listing")
     */
    public function recipients()
    {
        $recipient = $this->getDoctrine()->getRepository(Prestataire::class);
        $recipients = $recipient->findAll();
        return $this->render('front/recipients.html.twig', [
            'recipients' => $recipients,
            'recipients_title' => 'Recipients',
            'superlist' => 'Superlist',
            'links' => array('Home', 'Listing', 'Admin', 'Contact', 'Login', 'Register'),
            'icons' => array('twitter', 'facebook', 'google-plus', 'linkedin', 'instagram'),
        ]);
    }

    /**
     * @Route("/recipient/{id}", name="Recipient")
     */
    public function recipient(Prestataire $recipient, PrestataireRepository $repo)
    {
        $recipient = $repo->find($recipient);

        return $this->render('front/recipient.html.twig', [
            'recipient' => $recipient,
            'detail_name' => 'Detail',
            'superlist' => 'Superlist',
            'links' => array('Home', 'Listing', 'Admin', 'Contact', 'Login', 'Register'),
            'icons' => array('twitter', 'facebook', 'google-plus', 'linkedin', 'instagram'),

        ]);
    }

    /**
     * @Route("/contact", name="Contact")
     */
    public function contact()
    {
        $contact = 'Contact';
        $superlist = 'Superlist';

        return $this->render('front/contact.html.twig', [
            'contact_title' => $contact,
            'superlist' => $superlist,
            'links' => array('Home', 'Listing', 'Admin', 'Contact', 'Login', 'Register'),
            'icons' => array('twitter', 'facebook', 'google-plus', 'linkedin', 'instagram'),
        ]);
    }


}
