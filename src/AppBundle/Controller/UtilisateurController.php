<?php

namespace AppBundle\Controller;
use AppBundle\Entity\Utilisateur;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class UtilisateurController extends Controller
{
    /**
     * @Route("/addUser/{nom}/{prenom}/{email}/{pwd}/{addresse}",name="addUser")
     */
    public function addUserAction($nom,$prenom,$email,$pwd,$addresse)

    {  $repository = $this->getDoctrine()->getRepository("AppBundle:Utilisateur");
        $user = $repository->findOneBy(['email' => $email ]);

        if($user == null )
        {  $user= new Utilisateur();
            $user->setNom($nom);
            $user->setPrenom($prenom);
            $user->setEmail($email);
            $user->setPassword($pwd);
            $user->setAddresse($addresse);
            $user->setNote(0);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $repository = $this->getDoctrine()->getRepository("AppBundle:Utilisateur");
            $user = $repository->findOneBy(['email' => $email ]);

        }
        else {$user = null;}

        if(($user!=null) ){

            $data = array(
                'etat'=> 'true',
                'nom' => $user->getNom(),
		'id' => $user->getId(),
                'prenom' =>$user->getPrenom() ,
                'addresse' =>$user->getAddresse() ,
                'email' => $user->getEmail() ,
                'password' => $user->getPassword(),
                'note'=> $user->getNote(),
            );


        }
        else{
            $data = array(
                'etat'=> 'false',
            );
        }

        return new JsonResponse($data);



    }

    /**
     * @Route("/checkUser/{email}/{pwd}",name="checkUser")
     */
    public function checkUserAction($email,$pwd)

    {   $repository = $this->getDoctrine()->getRepository("AppBundle:Utilisateur");
        $user = $repository->findOneBy(['email' => $email ]);

        if(($user!=null) && ($user->getPassword()==$pwd)){

                $data = array(
                    'etat'=> 'true',
                    'nom' => $user->getNom(),
		    'id' => $user->getId(),
                    'prenom' =>$user->getPrenom() ,
                    'addresse' =>$user->getAddresse() ,
                    'email' => $user->getEmail() ,
                    'password' => $user->getPassword(),
                    'note'=> $user->getNote(),
                );


        }
        else{
            $data = array(
                'etat'=> 'false',
            );
        }



        return new JsonResponse($data);


    }

}


