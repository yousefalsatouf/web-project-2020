<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserProfileController extends AbstractController
{
    /**
     * @Route("/user-profile", name="Profile")
     */
    public function userProfile(AuthenticationUtils $auth, Security $security)
    {
        $username = $security->getUser();

        return $this->render('user/profile.html.twig', [
            'superlist'=>"Superlist",
            'username'=> $username,
        ]);
    }
}
