<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Magasins;
use Symfony\Component\HttpFoundation\JsonResponse;

class MagasinController extends Controller
{
    /**
     * @Route("/addMagasin/{addresse}/{tel}",name="addMagasin")
     *
     *
    public function addMagasinAction($addresse,$tel)

    {
            $magasin= new Magasin();
            $magasin->setAdressemagasin($addresse);
            $magasin->setTel($tel);
            $magasin->setIdEnseigne();

            $em = $this->getDoctrine()->getManager();
            $em->persist($magasin);
            $em->flush();

        return $this->render('default/addUser.html.twig', array('magasin' => $magasin));

    }
    */

    /**
     * @Route("/getListeMagasin/{lat}/{long}/{km}",name="getListeMagasin")
     */

    public function getListeMagasin($lat, $long, $km)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository("AppBundle:Magasins");
        $listMagasin=$repository->findAll();

        $earth_radius = 6378137;   // Terre = sphère de 6378km de rayon
        $rlat = deg2rad($lat);
        $rlong = deg2rad($long);
        $data = array();
        if($listMagasin!=null) {
            foreach ($listMagasin as $magasin) {
                $rlatm = deg2rad($magasin->getXy());
                $rlongm = deg2rad($magasin->getSequence());
                $dlat = ($rlatm - $rlat) / 2;
                $dlong = ($rlongm - $rlong) / 2;
                $a = (sin($dlat) * sin($dlat)) + cos($rlat) * cos($rlatm) * (sin($dlong) * sin($dlong));
                $d = 2 * atan2(sqrt($a), sqrt(1 - $a));
                $meters = ($earth_radius * $d);
                if ($meters < $km) {
                    $cap = array(
                        'etat' => 'true',
                        'id' => $magasin->getId(),
                        'nom' => $magasin->getNommagasin(),
                        'adresse'=>$magasin->getAdresse(),
                        'codepostale'=>$magasin->getCodepostale(),
                    );
                    array_push($data, $cap);
                }
            }
        }
        if($listMagasin!=null){
            $data1 = array(
                'etat'=>'true',
                'magasin'=> $data,
            );
        }
        else {
            $data1 = array(
                'etat'=>false,
                'magasin'=>$data,
            );
        }

        return new JsonResponse($data1);

        //return $this->render('default/listeMagasin.html.twig',array('listMagasin' => $listMagasin,'position'=>$position));

    }



    /**
     * @Route("/getListeMagasins",name="getListeMagasins")
     */
    public function getListeMagasinsAction() {

        $repository = $this->getDoctrine()->getManager()->getRepository("AppBundle:Magasins");
        $listeMagasins=$repository->findAll();

        $data = array();
        if($listeMagasins!=null) {
            foreach ($listeMagasins as $magasin){
                $magasinData = array(
                    'idMagasin' => $magasin->getId(),
                    'nomMagasin' => $magasin->getNommagasin(),
                    'adresseMagasin' => $magasin->getAdresse(),
                    'cpMagasin' => $magasin->getCodepostale(),
                    'latitudeMagasin' => $magasin->getXy(),
                    'longitudeMagasin' => $magasin->getSequence(),
                );
                array_push($data, $magasinData);
            }
        }

        if($listeMagasins!=null){
            $data1 = array(
                'magasin'=> $data,
            );
        }
        else {
            $data1 = array(
                'etat'=>false,
                'magasin'=>$data,
            );
        }
        return new JsonResponse($data1);

        return new JsonResponse($data);
    }

}
