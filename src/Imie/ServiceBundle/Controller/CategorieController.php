<?php

namespace Imie\ServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Imie\ServiceBundle\Entity\UnService;

class CategorieController extends Controller
{
    /**
     * @Route("/categorie")
     * @Template()
     */
    public function categorieAction()
    {
        return array();
    }

    /**
     * @Route("/categorie/ajout")
     * @Template()
     */
    public function ajoutCategorieAction()
    {
        return array();
    }


}
