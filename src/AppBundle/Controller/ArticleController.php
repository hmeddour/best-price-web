<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Serializer;


use AppBundle\Entity\Article;
use AppBundle\Entity\Capture;


class ArticleController extends Controller
{
    /**
     * @Route("/ajouterArticle/{libelle}/{codebarres}/{marque}/{type}/{description}/{note}/{poids}/{couleur}/{taille}/{prix}/{id_magasin}/{id_utilisateur}",name="ajouterArticle")
     */
    public function ajouterArticleAction($libelle, $codebarres, $marque, $type, $description, $note, $poids, $couleur, $taille, $prix, $id_magasin, $id_utilisateur)
    {
        $article = new Article();
        $article->setLibelle($libelle);
        $article->setCodebarres($codebarres);
        $article->setMarque($marque);
        $article->setType($type);
        $article->setDescription($description);
        $article->setNote($note);
        $article->setPoids($poids);
        $article->setCouleur($couleur);
        $article->setTaille($taille);

        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();


        $repository = $this->getDoctrine()->getRepository("AppBundle:Article");
        $article = $repository->findOneBy(['codebarres' => $codebarres]);

        $repository = $this->getDoctrine()->getRepository("AppBundle:Utilisateur");
        $utilisateur = $repository->findOneBy(['id' => $id_utilisateur]);

        $repository = $this->getDoctrine()->getRepository("AppBundle:Magasin");
        $magasin = $repository->findOneBy(['id' => $id_magasin]);


        if ($article != null) {
            $capture = new Capture();
            $capture->setPrix($prix);
            $capture->setDate(new \DateTime());
            $capture->setIdArticle($article);
            $capture->setIdUtilisateur($utilisateur);
            $capture->setIdMagasin($magasin);
            $em = $this->getDoctrine()->getManager();
            $em->persist($capture);
            $em->flush();
        }

        $data = array(
            'etat'=>'true'
        );

       return new JsonResponse($data);

    }


    /**
     * @Route("/getArticleById/{id}",name="getArticleById")
     */
    public function getArticleByIdAction($id)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Article");
        $article = $repository->findOneBy(['id' => $id]);

        if($article!=null){
            $data = array(
                'etat'=>'true',
                'id' => $article->getId(),
                'libelle' => $article->getLibelle(),
                'codebarres' => $article->getCodebarres(),
                'marque' => $article->getMarque(),
                'type' => $article->getType(),
                'description' => $article->getDescription(),
                'note' => $article->getNote(),
                'poids' => $article->getPoids(),
                'couleur' => $article->getCouleur(),
                'taille' => $article->getTaille(),

            );
        }
        else{
            $data = array(
                'etat'=>'false'
            );
        }
        return new JsonResponse($data);
        //return $this->render('default/ajouterArticle.html.twig', array('article' => $article));
    }

    /**
     * @Route("/getArticleByRef/{codebarres}",name="getArticleByRef")
     */
    public function getArticleByRefAction($codebarres)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Article");
        $article = $repository->findOneBy(['codebarres' => $codebarres]);
	
	
        if($article!=null){
   		$data = array(
       			'etat'=>'true',
		       'id' => $article->getId(),
		       'libelle' => $article->getLibelle(),
		       'codebarres' => $article->getCodebarres(),
		       'marque' => $article->getMarque(),
		       'type' => $article->getType(),
		       'description' => $article->getDescription(),
		       'note' => $article->getNote(),
		       'poids' => $article->getPoids(),
		       'couleur' => $article->getCouleur(),
		       'taille' => $article->getTaille(),

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
     * @Route("/getArticleByNom/{libelle}",name="getArticleByNom")
     */
    public function getArticleByNomAction($libelle)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Article');
        $query = $repository->createQueryBuilder('a')
            ->where('a.libelle LIKE :text')
            ->setParameter('text', '%'.$libelle.'%')
            ->getQuery();
        $res= $query->getResult();


        $data=[];
        foreach($res as $article)
        {$row = array(

            'id' => $article->getId(),
            'libelle' => $article->getLibelle(),
        );


            array_push($data,$row);
        }

        return new  JsonResponse ($data);

    }




    /**
     * @Route("/getComparaison/{id}",name="getComparaison")
     */
    public function getComparaisonAction($id)
    {


        $em = $this->getDoctrine()->getManager()->createQueryBuilder();

        $qr = $em->select('c')
            ->from('AppBundle:Capture', 'c')
            ->innerJOIN('c.idMagasin', 'm')
            ->addSelect('m')
            ->innerJOIN('c.idArticle', 'ar')
            ->addSelect('ar')
            ->where('ar.id =' . $id)
            ->getQuery();

        $res = $qr->getArrayResult();
        $json=json_encode($res);


        return $this->render('default/index.html.twig', array('json' =>$json));
    }


    /**
     * @Route("/getComparaisonDate/{id_article}/{id_magasin}/{dateDeb}/{dateFin}",name="getComparaisonDate")
     */
    public function getComparaisonDateAction($id_article, $id_magasin, \DateTime $dateDeb, \DateTime $dateFin)
    {
        $em = $this->getDoctrine()->getManager()->createQueryBuilder();
        //$from =  new \DateTime($dateDeb->format("Y-m-d") . " 00:00:00");
        //$to = new \DateTime($dateFin->format("Y-m-d") . " 23:59:59");


        $serializer = new Serializer(array(new DateTimeNormalizer('Y-m-d')));
        $from = $serializer->normalize(
            new \DateTime($dateDeb->format("Y-m-d")),
            null,
            array(DateTimeNormalizer::FORMAT_KEY => 'Y-m-d')
        );

        $to = $serializer->normalize(
            new \DateTime($dateFin->format("Y-m-d")),
            null,
            array(DateTimeNormalizer::FORMAT_KEY => 'Y-m-d')
        );

        $qr = $em->select('c')
            ->from('AppBundle:Capture', 'c')
            ->innerJOIN('c.idMagasin', 'm')
            ->addSelect('m')
            ->innerJOIN('c.idArticle', 'ar')
            ->addSelect('ar')
            ->where('ar.id =' . $id_article)
            ->andWhere('m.id=' . $id_magasin)
            ->andWhere('c.date BETWEEN :from AND :to')
            ->setParameter('from', $from)
            ->setParameter('to', $to)
            ->getQuery();


        $res = $qr->getArrayResult();
        $data=array(

            'etat'=>'true',
            'data'=>$res,
        );
        if($res!=null) {

            return new JsonResponse($data);
        }
        else{
            $data= array(
                'etat'=>'false'
            );
            return new JsonResponse($data);
        }



        // return $this->render('default/getComparaisonDate.html.twig', array('articles' => $res));
    }

}


