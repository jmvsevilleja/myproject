<?php

namespace Yoda\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Yoda\EventBundle\Entity\Event;
//use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($count, $name)
    {

      /*  $event = new Event();

        $event->setName('Name Here');
        $event->setLocation('Location Here');
        $event->setTime(new \DateTime('tomorrow'));*/
        //$event->setDetails('Details Here');

        $em = $this->getDoctrine()->getManager();
        //$em->persist($event);
        //$em->flush();

        $repo = $em->getRepository('EventBundle:Event');

        $event = $repo->findOneBy(array(
        	'name' => 'Name Here'
        ));

        //var_dump($event); die();
    	//$data = array('count'=> $count, 'name'=>$name);
        return $this->render('EventBundle:Default:index.html.twig', array(
        	'name' => $name,
        	'event' => $event,
        ));
/*        $json = json_encode($data);
        $response = new Response($json);
        $response->headers->set('Content-Type','application/json');
        return $response;*/


    }
}
