<?php

namespace Imie\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Basic controller.
 *
 * @Route("/")
 */
class BasicController extends Controller
{

  /**
   * Basic homepage.
   *
   * @Route("/", name="basic")
   * @Method("GET")
   * @Template()
   */
    public function indexAction($name)
    {
        $name = "john";
        $message = \Swift_Message::newInstance()
              ->setSubject('Hello')
              ->setFrom('coucoujegeek@gmail.com')
              ->setTo('q.douteau@gmail.com')
              ->setBody($this->renderView('ImieMainBundle:Basic:email.txt.twig', array('name' => $name)))
        ;
        $this->get('mailer')->send($message);
        return $this->render('ImieMainBundle:Basic:index.html.twig');
    }
}
