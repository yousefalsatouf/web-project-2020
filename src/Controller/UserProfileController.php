<?php

namespace App\Controller;

use App\Entity\Images;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserProfileController extends AbstractController
{
    /**
     * @Route("/user-profile", name="Profile")
     */
    public function userProfile(AuthenticationUtils $auth, Security $security, Request $request): Response
    {

        $username = $security->getUser();
        //dd($request->files->get('image'));

        return $this->render('user/profile.html.twig', [
            'superlist'=>"Superlist",
            'username'=> $username,
        ]);
    }


}
