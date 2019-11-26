<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DetailController extends AbstractController
{
    /**
     * @Route("/detail", name="detail")
     */
    public function index()
    {
        return $this->render('detail/index.html.twig', [
            'controller_name' => 'Detail',
        ]);
    }
}
