<?php

namespace App\Controller;


use App\Entity\Images;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserProfileController extends AbstractController
{
    /**
     * @Route("/user-profile", name="Profile")
     */
    public function userProfile(AuthenticationUtils $auth, Security $security, Request $request): Response
    {
        $img = new Images();
        $form = $this->createForm(Images::class, $img);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $img->getImage();

            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

            // moves the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('brochures_directory'),
                $fileName
            );

            $img->setImage($fileName);



            return $this->redirectToRoute('Profile');
        }

        return $this->render('user/profile.html.twig', [
            'img' => $img,
            'form' => $form->createView(),
        ]);
       /* $username = $security->getUser();

        return $this->render('user/profile.html.twig', [
            'superlist'=>"Superlist",
            'username'=> $username,
        ]);*/
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }
}
