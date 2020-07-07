<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CarteFidelite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


class CarteFideliteController extends Controller
{
    /**
     * @Route("/getListeCartesFidelite/{id_utilisateur}",name="getListeCartesFidelite")
     */
    public function getListeCartesFideliteAction($id_utilisateur)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository("AppBundle:CarteFidelite");
        $listCartesFidelite=$repository->findBy(array('idUtilisateur'=>$id_utilisateur));

        if($listCartesFidelite!=null){
            $data2=array();
            foreach(  $listCartesFidelite as $carte)
            {      $data3 = array(
                'id' => $carte->getId(),
                'codebarres' => $carte->getCodebarrescartefidelite(),
                'enseigne'=>$carte->getIdEnseigne()->getNomenseigne(),
                'logo'=>$carte->getIdEnseigne()->getLogoenseigne(),
            );

                array_push($data2,$data3);
            }
            $data= array(
                'etat'=>'true',
                'data'=>$data2,
            );

        }
        else{
            $data = array(
                'etat'=>'false'
            );
        }
        return new JsonResponse($data);

    }

    /**
     * @Route("/ajouterCarte/{id_utilisateur}/{id_enseigne}/{codebarres}",name="ajouterCarte")
     *
     */
    public function ajouterCarteAction($id_utilisateur,$id_enseigne,$codebarres)

    {
        $repository = $this->getDoctrine()->getManager()->getRepository("AppBundle:Utilisateur");
        $utilisateur = $repository->findOneBy(array('id'=>$id_utilisateur));

        $repository = $this->getDoctrine()->getManager()->getRepository("AppBundle:Enseigne");
        $enseigne = $repository->findOneBy(array('id'=>$id_enseigne));

        $carte = new CarteFidelite();
        $carte->setIdUtilisateur($utilisateur);
        $carte->setIdEnseigne($enseigne);
        $carte->setCodebarrescartefidelite($codebarres);

        $em = $this->getDoctrine()->getManager();
        $em->persist($carte);
        $em->flush();

        return $this->render('default/ajouterCarte.html.twig', array('Carte' => $carte));

    }

    /**
     * @Route("/supprimerCarte/{id_carte}",name="supprimerCarte")
     */
    public function supprimerCarteAction($id_carte)

    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:CarteFidelite");
        $carte = $repository->findOneBy(['id' => $id_carte]);

        if ($carte != null) {

            $em = $this->getDoctrine()->getManager();
            $em->remove($carte);
            $em->flush();

        }
        return $this->render('default/index.html.twig');

    }


}


