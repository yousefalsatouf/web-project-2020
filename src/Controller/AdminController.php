<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        $admin = 'Admin';

        return $this->render('admin/index.html.twig', [
            'admin_title' => $admin,
        ]);
    }
}
