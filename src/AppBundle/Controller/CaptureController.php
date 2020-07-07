<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Capture;
use Symfony\Component\HttpFoundation\JsonResponse;

class CaptureController extends Controller
{
    /**
     * @Route("/getListeCapture/{id_article}",name="getListeArticle")
     */

    public function getListeCaptureAction($id_article)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Capture");
        $listecapture = $repository->findBy(['idArticle' => $id_article], ['prix' => 'ASC']);

        $data=array();
        if($listecapture!=null){
            foreach ($listecapture as $capture){
                $cap=array(
                    'id'=>$capture->getId(),
                    'id_article'=>$id_article,
                    'prix'=>$capture->getPrix(),
                    'magasin'=>$capture->getIdMagasin()->getNommagasin(),
                    'adresse'=>$capture->getIdMagasin()->getAdresse(),

                );



                array_push($data,$cap);
            }
        }
        $data2 = array(
            'data'=>$data
        );




        return new JsonResponse($data2);
    }
}


