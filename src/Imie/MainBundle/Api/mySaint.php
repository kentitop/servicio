<?php

namespace Imie\MainBundle\Api;

use Symfony\Component\DependencyInjection\ContainerInterface as Container;

/**
 *
 */
class mySaint
{
  private $url;
  private $key;
  private $format;
  private $container;

  public function __construct(Container $container) {
    $this->container = $container;
    $this->url = $this->container->getParameter('fete_du_jour_url');
    $this->key = $this->container->getParameter('fete_du_jour_key');
    $this->format = $this->container->getParameter('fete_du_jour_format');

  }
  function getSaintOfTheDay() {
    // construction de l'url
    $url = $this->url.$this->key.$this->format;

    //$json_reponse = file_get_contents($url);

    // Méthode avec CURL 
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $json_reponse = curl_exec($curl);
    curl_close($curl);

    // décodage de la réponse json -> tableau PHP
    $reponse = json_decode($json_reponse, true);
    dump($reponse);
    return $reponse['name'];
  }

}
