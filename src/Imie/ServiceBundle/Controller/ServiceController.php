<?php

namespace Imie\ServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Imie\ServiceBundle\Entity\UnService;
use Imie\ServiceBundle\Entity\Categorie;

use Symfony\Component\HttpFoundation\Request;

class ServiceController extends Controller
{
    /**
     * @Route("/", name="homepage")
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
     * @Route("/service", name="service")
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
     * @Route("/service/ajout", name="addService")
     * @Template()
     */
    public function ajoutServiceAction(Request $request)
    {

        $servicio = new UnService();
        $formBuilder = $this->get('form.factory')->createBuilder('form', $servicio);

        $formBuilder
          ->add('titre', 'text')
          ->add('createdAt', 'datetime', array('widget' => 'single_text'))
          ->add('save', 'submit');

        $form = $formBuilder->getForm();
        $form->handleRequest($request);

        if($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($servicio);
          $em->flush();

          return $this->redirect($this->generateUrl('homepage'));
        }

        return array(
          'formulaire_service'=>$form->createView()
        );
    }

    /**
     * @Route("/service/reservation", name="reservationService")
     * @Template()
     */
    public function reservationServiceAction()
    {
        return array();
    }
}
