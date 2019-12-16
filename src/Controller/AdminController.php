<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="Admin")
     */
    public function index()
    {
        $admin = 'Admin';
        $superList = 'Superlist';

        return $this->render('admin/index.html.twig', [
            'admin_title' => $admin,
            'superlist' => $superList,
        ]);
    }
}
