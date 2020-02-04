<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use App\Security\LoginFormAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="Register")
     */
    public function register(Request $request,
                             UserPasswordEncoderInterface $passwordEncoder,
                             GuardAuthenticatorHandler $guardHandler,
                             LoginFormAuthenticator $authenticator,
                             MailerInterface $mailer,
                             UserRepository $repo): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
        $confirmationError = false;
        if ($form->isSubmitted())
        {
            $password =  $form->get('plainPassword')->getData();
            $confirm = $form->get('confirmPassword')->getData();
            if ($password == $confirm)
            {
                if ($form->isValid()) {
                    // encode the plain password
                    $user->setPassword(
                        $passwordEncoder->encodePassword(
                            $user,
                            $form->get('plainPassword')->getData()
                        )
                    );

                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($user);
                    $entityManager->flush();

                    // do anything else you need here, like send an email
                    $mine = "yousef.alsatouf94@gmail.com";
                    $you = $form->get('email')->getData();
                    $email = (new Email())
                                ->from($mine)
                                ->to($you)
                                ->subject("test sending email with mailer")
                                ->text("sending email is fun");
                    $mailer->send($email);

                    return $guardHandler->authenticateUserAndHandleSuccess(
                        $user,
                        $request,
                        $authenticator,
                        'main' // firewall name in security.yaml
                    );
                }
            }
            else
            {
                $confirmationError="Sorry, Password doesn't match !";
            }

        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
            'register_title' => "Register !!",
            'confirmationError' => $confirmationError,
            'superlist' => "Superlist"
        ]);
    }
}
