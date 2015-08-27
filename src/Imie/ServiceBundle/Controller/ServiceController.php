<?php

namespace Imie\ServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Imie\ServiceBundle\Entity\UnService;
use Imie\ServiceBundle\Entity\Categorie;

class ServiceController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
      $em = $this->getDoctrine()->getManager();
      $repoServices = $em->getRepository('ImieServiceBundle:UnService');
      $servicios = $repoServices->findAll();

      //dump($servicios);
        return array(
          'mes_services' => $servicios
        );
    }

    /**
     * @Route("/service")
     * @Template()
     */
    public function serviceAction()
    {
      $unoservicio = new UnService();
      $unoservicio->setTitre('Tondre la pelouse');
      $unoservicio->setCreatedAt(new \DateTime);
      $categorie = new Categorie();
      $categorie->setNom('Jardinage');


      $em = $this->getDoctrine()->getManager();
      $em->persist($unoservicio);
      $em->flush();

      return array(
        'mon_service' => $unoservicio,
        'ma_categorie' => $categorie
      );
    }

    /**
     * @Route("/service/ajout")
     * @Template()
     */
    public function ajoutServiceAction()
    {
        return array();
    }

    /**
     * @Route("/service/reservation")
     * @Template()
     */
    public function reservationServiceAction()
    {
        return array();
    }
}
