<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserProfileController extends AbstractController
{
    /**
     * @Route("/user-profile", name="Profile")
     */
    public function userProfile()
    {

        return $this->render('user/profile.html.twig', [
            'superlist'=>"Superlist",
            'profile_title'=>"User",
        ]);
    }
}
