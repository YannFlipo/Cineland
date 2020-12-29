<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Session;

class BaseController extends AbstractController{
	public function accueil($nom, Session $session) {
		if ($session->has('nbreFois'))
 			$session->set('nbreFois', $session->get('nbreFois')+1);
 		else
 			$session->set('nbreFois', 1);
 		return $this->render('accueil.html.twig', array('nom' => $nom, 'nbreFois' => $session->get('nbreFois')));
 	}
}