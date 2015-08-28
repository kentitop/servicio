<?php

namespace Imie\ServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
//use Imie\ServiceBundle\Entity\UnService;
//use Imie\ServiceBundle\Entity\Categorie;

use Symfony\Component\HttpFoundation\Request;

class CategorieController extends Controller
{
    /**
     * @Route("/categorie", name="categorie")
     * @Template()
     */
    public function categorieAction()
    {
      $em = $this->getDoctrine()->getManager();
      $repoCategorie = $em->getRepository('ImieServiceBundle:Categorie');
      $categorie = $repoCategorie->findAll();

      //dump($servicios);
        return array(
          'mes_categories' => $categorie
        );
    }

    /**
     * @Route("/categorie/ajout", name="addCategorie")
     * @Template()
     */
    public function ajoutCategorieAction(Request $request)
    {
      $categorie = new Categorie();
      $formBuilder = $this->get('form.factory')->createBuilder('form', $categorie);

      $formBuilder
        ->add('nom', 'text')
        ->add('description', 'text')
        ->add('save', 'submit');

      $form = $formBuilder->getForm();
      $form->handleRequest($request);

      if($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($categorie);
        $em->flush();

        return $this->redirect($this->generateUrl('categorie'));
      }

      return array(
        'formulaire_categorie'=>$form->createView()
      );
    }


}
