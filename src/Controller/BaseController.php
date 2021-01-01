<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Acteur;
use App\Entity\Film;
use App\Entity\Genre;

class BaseController extends AbstractController{
	public function accueil($nom, Session $session) {
		if ($session->has('nbreFois'))
 			$session->set('nbreFois', $session->get('nbreFois')+1);
 		else
 			$session->set('nbreFois', 1);
 		return $this->render('accueil.html.twig', array('nom' => $nom, 'nbreFois' => $session->get('nbreFois')));
 	}

 	public function init() {
 		$em = $this->getDoctrine()->getManager();

 		$genreA = new Genre;
 		$genreA->setNom("animation");
 		$em->persist($genreA);

 		$genreB = new Genre;
 		$genreB->setNom("policier");
 		$em->persist($genreB);

 		$genreC = new Genre;
 		$genreC->setNom("drame");
 		$em->persist($genreC);

 		$genreD = new Genre;
 		$genreD->setNom("comédie");
 		$em->persist($genreD);

 		$genreE = new Genre;
 		$genreE->setNom("X");
 		$em->persist($genreE);

 		$acteurA = new Acteur;
 		$acteurA->setNomPrenom("Galabru Michel");
 		$acteurA->setDateNaissance(new \DateTime("1922-10-27"));
 		$acteurA->setNationalite("france");
 		$em->persist($acteurA);

 		$acteurB = new Acteur;
 		$acteurB->setNomPrenom("Deneuve Catherine");
 		$acteurB->setDateNaissance(new \DateTime("1943-10-22"));
 		$acteurB->setNationalite("france");
 		$em->persist($acteurB);

 		$acteurC = new Acteur;
 		$acteurC->setNomPrenom("Depardieu Gérard");
 		$acteurC->setDateNaissance(new \DateTime("1948-12-27"));
 		$acteurC->setNationalite("russie");
 		$em->persist($acteurC);

 		$acteurD = new Acteur;
 		$acteurD->setNomPrenom("Lanvin Gérard");
 		$acteurD->setDateNaissance(new \DateTime("1950-06-21"));
 		$acteurD->setNationalite("france");
 		$em->persist($acteurD);

 		$acteurE = new Acteur;
 		$acteurE->setNomPrenom("Désiré Dupond");
 		$acteurE->setDateNaissance(new \DateTime("2001-12-23"));
 		$acteurE->setNationalite("groland");
 		$em->persist($acteurE);

 		$filmA = new Film;
 		$filmA->setTitre("Astérix aux jeux olympiques");
 		$filmA->setDuree(117);
 		$filmA->setDateSortie(new \DateTime("2008-01-20"));
 		$filmA->setNote(8);
 		$filmA->setAgeMinimal(0);
 		$filmA->setGenre($genreA);
 		$em->persist($filmA);

 		$filmB = new Film;
 		$filmB->setTitre("Le dernier Métro");
 		$filmB->setDuree(131);
 		$filmB->setDateSortie(new \DateTime("1980-09-17"));
 		$filmB->setNote(15);
 		$filmB->setAgeMinimal(12);
 		$filmB->setGenre($genreC);
 		$filmB->addActeur($acteurB);
 		$filmB->addActeur($acteurC);
 		$em->persist($filmB);

 		$filmC = new Film;
 		$filmC->setTitre("le choix des armes");
 		$filmC->setDuree(135);
 		$filmC->setDateSortie(new \DateTime("1981-10-19"));
 		$filmC->setNote(13);
 		$filmC->setAgeMinimal(18);
 		$filmC->setGenre($genreB);
 		$filmC->addActeur($acteurB);
 		$filmC->addActeur($acteurC);
 		$filmC->addActeur($acteurD);
 		$em->persist($filmC);

 		$filmD = new Film;
 		$filmD->setTitre("Les Parapluies de Cherbourg");
 		$filmD->setDuree(91);
 		$filmD->setDateSortie(new \DateTime("1964-02-19"));
 		$filmD->setNote(9);
 		$filmD->setAgeMinimal(0);
 		$filmD->setGenre($genreC);
 		$filmD->addActeur($acteurB);
 		$em->persist($filmD);

 		$filmE = new Film;
 		$filmE->setTitre("La Guerre des boutons");
 		$filmE->setDuree(90);
 		$filmE->setDateSortie(new \DateTime("1962-04-18"));
 		$filmE->setNote(7);
 		$filmE->setAgeMinimal(0);
 		$filmE->setGenre($genreD);
 		$filmE->addActeur($acteurA);
 		$em->persist($filmE);

 		$em->flush();
 		return $this->render('init.html.twig');
 	}
}