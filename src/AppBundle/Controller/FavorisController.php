<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Favoris;


class FavorisController extends Controller
{

    /**
     * @Route("/ajouterFavoris/{id_article}/{id_utilisateur}",name="ajouterFavoris")
     */
    public function ajouterFavorisAction($id_article, $id_utilisateur)

    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Capture");
        $capture = $repository->findOneBy(['idArticle' => $id_article], ['prix' => 'ASC']);

        $repository = $this->getDoctrine()->getRepository("AppBundle:Favoris");
        $listeFavoris = $repository->findBy(array('idUtilisateur' => $id_utilisateur, 'idCapture' => $capture->getId()));

        $repository = $this->getDoctrine()->getRepository("AppBundle:Utilisateur");
        $utilisateur = $repository->findOneBy(['id' => $id_utilisateur]);

        $repository = $this->getDoctrine()->getRepository("AppBundle:Capture");
        $capture = $repository->findOneBy(['idArticle' => $id_article], ['prix' => 'ASC']);

        if ($listeFavoris == null) {
            $favoris = new Favoris();
            $favoris->setIdUtilisateur($utilisateur);
            $favoris->setNotification(1);
            $favoris->setIdCapture($capture);

            $em = $this->getDoctrine()->getManager();
            $em->persist($favoris);
            $em->flush();

        }

        return $this->render('default/addCapture.html.twig', array('capture' => $capture));

    }


    /**
     * @Route("/supprimerFavoris/{id_favoris}",name="supprimerFavoris")
     */
    public function supprimerFavorisAction($id_favoris)

    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Favoris");
        $favoris = $repository->findOneBy(['id' => $id_favoris]);

        if ($favoris != null) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($favoris);
            $em->flush();

        }
        return $this->render('default/index.html.twig');

    }


    /**
     * @Route("/afficherListeFavoris/{id_utilisateur}",name="afficherListeFavoris")
     */
    public function afficherListeFavorisAction($id_utilisateur)

    {
        $repository = $this->getDoctrine()->getManager()->getRepository("AppBundle:Favoris");
        $listFavoris = $repository->findBy(['idUtilisateur' => $id_utilisateur]);

        if ($listFavoris != null) {
            return $this->render('default/listeFavoris.html.twig', array('listFavoris' => $listFavoris, 'id_utilisateur' => $id_utilisateur));

        }

        return $this->render('default/index.html.twig');

    }


}
