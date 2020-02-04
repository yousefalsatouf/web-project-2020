<?php

namespace App\Controller;

use App\Entity\Images;
use App\Form\RegistrationFormType;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserProfileController extends AbstractController
{
    /**
     * @Route("/user-profile", name="Profile")
     */
    public function userProfile(AuthenticationUtils $auth, Security $security, Request $request, FileUploader $fileUploader)
    {

        return $this->render('user/profile.html.twig', [
            'superlist'=>"Superlist",
        ]);
    }

    /**
     * @Route("/admin/upload/test", name="upload_test")
     */
    public function temporaryUploadAction(Request $request)
    {}


}
