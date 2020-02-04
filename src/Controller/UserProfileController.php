<?php

namespace App\Controller;

use App\Entity\Images;
use App\Form\RegistrationFormType;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class UserProfileController extends AbstractController
{
    /**
     * @Route("/user-profile", name="Profile")
     */
    public function userProfile(Request $request, FileUploader $fileUploader)
    {
        $img = new Images();

        $form = $this->createForm(RegistrationFormType::class, $img);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            /** @var UploadedFile $uploadedFile */
            $uploadedFile = $form['imageFile']->getData();
            $destination = $this->getParameter('kernel.project_dir') . '/public/uploads';

            $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
            $newFilename = Urlizer::urlize($originalFilename).'-'.uniqid().'.'.$uploadedFile->guessExtension();
            $uploadedFile->move(
                $destination,
                $newFilename
            );
            $img->setImage($newFilename);
        }

        return $this->render('user/profile.html.twig', [
            'form' => $form->createView(),
            'superlist'=>"Superlist",
        ]);
    }

    /*/**
     * @Route("/upload", name="upload_test")
     */
    /*public function temporaryUploadAction(Request $request)
    {

        /** @var UploadedFile $uploadedFile */
      /*  $uploadedFile = $request->files->get('image');
        $destination = $this->getParameter('kernel.project_dir').'/public/uploads';

        $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
        $newFilename = $originalFilename.'-'.uniqid().'.'.$uploadedFile->guessExtension();

        $uploadedFile->move($destination, $newFilename);

        return $this->render('user/profile.html.twig', [
            'superlist'=>"Superlist",
        ]);

    }*/
}
