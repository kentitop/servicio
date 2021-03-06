<?php

namespace Imie\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Imie\MainBundle\Entity\Service;
use Imie\MainBundle\Entity\Image;
use Imie\MainBundle\Entity\Reservation;
use Imie\MainBundle\Form\ServiceType;
use Imie\MainBundle\Form\ServiceUpdateType;
use Symfony\Component\HttpFoundation\Response;

/**
 * Service controller.
 *
 * @Route("/")
 */
class ServiceController extends Controller
{

    /**
     * Lists all Service entities.
     *
     * @Route("/", name="service")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $serviceSaintDuJour = $this->get('imiemain.getMySaint');
        $saint = $serviceSaintDuJour->getSaintOfTheDay();

        $serviceWheater = $this->get('imiemain.getMyWeather');
        $meteo = $serviceWheater->getWeatherOfTheDay();

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ImieMainBundle:Service')->findAll();

        return array(
            'entities' => $entities, 'saint' => $saint, 'meteo' => $meteo
        );
    }
    /**
     * Creates a new Service entity.
     *
     * @Route("/", name="service_create")
     * @Method("POST")
     * @Template("ImieMainBundle:Service:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Service();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('service_show', array('id' => $entity->getId())));
            //$returnArray = array("respondeCode" => 200, "welldone" => "bravo man");
            //$return = json_encode($returnArray);

            //return new Response($return, 200, array('Content-type' => 'application/json'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Service entity.
     *
     * @param Service $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Service $entity)
    {
        $form = $this->createForm(new ServiceType(), $entity, array(
            'action' => $this->generateUrl('service_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Service entity.
     *
     * @Route("/new", name="service_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Service();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }


    /**
     * Displays a form to edit an existing Service entity.
     *
     * @Route("/{id}/edit", name="service_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieMainBundle:Service')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Service entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Service entity.
    *
    * @param Service $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Service $entity)
    {
        $form = $this->createForm(new ServiceType(), $entity, array(
            'action' => $this->generateUrl('service_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Service entity.
     *
     * @Route("/{id}", name="service_update")
     * @Method("PUT")
     * @Template("ImieMainBundle:Service:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieMainBundle:Service')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Service entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('service_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Service entity.
     *
     * @Route("/{id}", name="service_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ImieMainBundle:Service')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Service entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('service'));
    }

    /**
     * Creates a form to delete a Service entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('service_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer', 'attr'=> array('class'=>'btn btn-danger')))
            ->getForm()
        ;
    }

    /**
    *
    * Fonction d'upload d'image
    *
    */
    public function uploadAction(Request $request)
    {
    $image = new Image();
    $form = $this->createFormBuilder($image)
        ->add('name')
        ->add('file')
        ->getForm();

    $form->handleRequest($request);

    if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();

        $image->getImage()->upload();
        $em->persist($image);
        $em->flush();

        return $this->redirectToRoute();
    }

    return array('form' => $form->createView());
  }

  /**
     * Finds and displays a Service entity.
     *
     * @Route("/{id}", name="service_show", requirements={"id"="\d+"})
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieMainBundle:Service')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Service entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        $form = $this->createForm(new ServiceUpdateType(), $entity, array(
            'action' => $this->generateUrl('resa-add', array('id'=> $id )),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Réserver', 'attr'=> array('class'=>'btn btn-success')));
        // if (isset($_POST) && $_POST['reservation'] == false) {
        //   $reservation =$_POST['reservation'];
        //   $idservice =$_POST['idservice'];
        //   $iduser =$_POST['iduser'];
        //
        // }
        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'update_form' => $form->createView(),
        );
    }

    /**
     * Traite en ajax la reservation
     *
     * @Route("/resa-add/{id}", name="resa-add", requirements={"id"="\d+"})
     * @Method("POST")
     * @Template()
     */
    public function resaAddAction(Request $request, $id)
    {
      $em = $this->getDoctrine()->getManager();

      $entity = $em->getRepository('ImieMainBundle:Service')->find($id);

      if (!$entity) {
          throw $this->createNotFoundException('Unable to find Service entity.');
      }
      $form = $this->createForm(new ServiceUpdateType(), $entity, array(
          'action' => $this->generateUrl('resa-add', array('id'=> $id )),
          'method' => 'POST',
      ));
$form->add('submit', 'submit', array('label' => 'Create'));
      $form->handleRequest($request);
      dump($form->getErrors());

      if ($form->isValid()) {
        $resa=new Reservation();
        $resa->setService($entity);
        $resa->setUser($this->getUser());
        dump($resa);
        $em->persist($resa);
        $em->flush();

        $returnArray = array("respondeCode" => 200, "welldone" => "Votre service à bien été réservé");
        $return = json_encode($returnArray);

        return new Response($return, 200, array('Content-type' => 'application/json'));


      }
      return array(
          'entity' => $resa,
      );

    }


}
