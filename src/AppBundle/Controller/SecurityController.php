<?php
/**
 * Created by PhpStorm.
 * User: Michael Trotzer
 * Date: 05.06.2017
 * Time: 10:57
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

//@TODO KlassenName groß
class SecurityController extends Controller
{
    public function indexAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/sign_in.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }
}