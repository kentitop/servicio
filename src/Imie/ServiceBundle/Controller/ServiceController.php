<?php

namespace Imie\ServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Imie\ServiceBundle\Entity\UnService;

class ServiceController extends Controller
{
    /**
     * @Route("/service")
     * @Template()
     */
    public function indexAction()
    {
      $unoservicio = new UnService();
      $unoservicio->setTitre('Tondre la pelouse');
        return array('mon_service' => $unoservicio);
    }
}
