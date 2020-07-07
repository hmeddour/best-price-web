<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ListeArticle;
use AppBundle\Entity\ListeCourses;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ListeCoursesController extends Controller
{
    /**
     * @Route("/CreerListe/{id_utilisateur}/{nom}",name="CreerListe")
     */
    public function CreerListeAction($id_utilisateur, $nom)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:ListeCourses");
        $nomliste = $repository->findOneBy(['nomListe' => $nom]);

        $repository = $this->getDoctrine()->getRepository("AppBundle:Utilisateur");
        $utilisateur = $repository->findOneBy(['id' => $id_utilisateur]);

        if ($nomliste == null) {
            $listecourse = new ListeCourses();
            $listecourse->setDate(new \DateTime());
            $listecourse->setNomListe($nom);
            $listecourse->setIdUtilisateur($utilisateur);

            $em = $this->getDoctrine()->getManager();
            $em->persist($listecourse);
            $em->flush();
        }
        return $this->render('default/ListeCourses.html.twig');
    }

    /**
     * @Route("/supprimerArticleListe/{id_article}/{id_liste}",name="supprimerArticleListe")
     */
    public function supprimerArticleListeAction($id_article, $id_liste)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:ListeArticle");
        $article = $repository->findOneBy(['idArticle' => $id_article, 'idListe' => $id_liste]);

        if ($article != null) {
            if ($article->getNbrArticle() == 1) {
                $em = $this->getDoctrine()->getManager();
                $em->remove($article);
                $em->flush();
            } else {
                $article->setNbrArticle($article->getNbrArticle() - 1);
                $em = $this->getDoctrine()->getManager();
                $em->flush();
            }

        }
        return $this->render('default/ListeCourses.html.twig');
    }


    /**
     * @Route("/ajouterArticleListe/{id_article}/{id_liste}",name="ajouterArticleListe")
     */
    public function ajouterArticleListeAction($id_article, $id_liste)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:ListeArticle");
        $article = $repository->findOneBy(['idArticle' => $id_article, 'idListe' => $id_liste]);

        $repository = $this->getDoctrine()->getRepository("AppBundle:ListeCourses");
        $liste = $repository->findOneBy(['idListe' => $id_liste]);

        if ($article != null) {
            $article->setNbrArticle($article->getNbrArticle() + 1);
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->render('default/ListeCourses.html.twig');
        } else {
            $listearticle=new ListeArticle();
            $listearticle->setIdArticle($id_article);
            $listearticle->setIdListe($liste);
            $listearticle->setNbrArticle(1);
            $em = $this->getDoctrine()->getManager();
            $em->persist($listearticle);
            $em->flush();


            return $this->render('default/ListeCourses.html.twig');
        }
    }

    /**
     * @Route("/afficherArticleListe/{id_utilisateur}/{id_liste}",name="afficherArticleListe")
     */
    public function afficherArticleListeAction($id_utilisateur,$id_liste)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:ListeCourses");
        $liste = $repository->findOneBy(['idUtilisateur' => $id_utilisateur,'idListe'=>$id_liste]);

        $repository = $this->getDoctrine()->getRepository("AppBundle:ListeArticle");
        $listearticle = $repository->findBy(['idListe'=>$liste->getIdListe()]);

        foreach ($listearticle as $article){
            $repository = $this->getDoctrine()->getRepository("AppBundle:Article");
            $nomarticle = $repository->findOneBy(['id'=> $article->getIdArticle()]);
            echo $nomarticle->getLibelle();
        }
        return $this->render('default/ListeCourses.html.twig');
    }

    /**
     * @Route("/afficherListeCourses/{id_utilisateur}",name="afficherListeCourses")
     */
    public function afficherListeCoursesAction($id_utilisateur)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:ListeCourses");
        $listeCourses = $repository->findBy(['idUtilisateur' => $id_utilisateur]);

        foreach ($listeCourses as $liste){
            echo $liste->getNomListe();
        }
        return $this->render('default/ListeCourses.html.twig');
    }


}
