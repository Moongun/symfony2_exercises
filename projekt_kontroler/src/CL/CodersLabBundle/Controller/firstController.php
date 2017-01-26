<?php

namespace CL\CodersLabBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use CL\CodersLabBundle\Entity\Text;

/**
 * @Route("/first")
 */
class firstController extends Controller
{
    /**
     * @Route("/helloWorld")
     */
    public function helloAction(){
        $a = "Cześć ziomalu";
        return new Response($a);
    }
    
    /**
     * @Route("/goodbye/{ola}")
     */
    public function goodbyeAction($ola){
        return new Response("Goodbye ".$ola);
    }
    /**
     * @Route("/welcome/{ola}/{niemirska}")
     */
    public function welcomeAction($ola, $niemirska){
        return new Response("Welcome ".$ola." ".$niemirska);
    }
    
    /**
     * @Route("/showPost/{id}", requirements={"id"="\d+"})
     */
    public function showPostAction($id){
        return new Response("Showing post ".$id);
    }

//    /**
//     * @Route("/form")
//     * @Method("GET")
//     */
//    public function getAction(Request $request){
//        $get = new Text();
//        $form =$this->createFormBuilder($get)
//                ->setMethod('GET')
//                ->add('text', 'text')
//                ->add('save','submit', array('label'=>'create'))
//                ->getForm();
//        
//        return $this->render('default/testForm.html.twig', array('form'=>$form->createView()));
//    }
//    
    /**
     * @Route("/form")
     * @Method("POST")
     */
    public function postAction(Request $request){
        $post = new Text();
        $form = $this->createFormBuilder($post)
                ->setMethod('POST')
                ->add('text', 'text')
                ->add('save','submit', array('label'=>'create post'))
                ->getForm();
        
        $request->request->get('text');
        
        return new Response("Formularz przyjęty");
    }
}
