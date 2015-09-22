<?php

namespace Imie\MainBundle\Api;

use Symfony\Component\DependencyInjection\ContainerInterface as Container;

/**
 *
 */
class myWeather {

  private $url;
  private $key;
  private $containerWeather;

  public function __construct(Container $containerWeather) {
    $this->container = $containerWeather;
    $this->url = $this->container->getParameter('weather_url');
    $this->key = $this->container->getParameter('weather_key');

  }
  function getWeatherOfTheDay() {
    // construction de l'url
    $url = $this->url.$this->key;

    //$json_reponse = file_get_contents($url);

    // Méthode avec CURL
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $json_reponse = curl_exec($curl);
    curl_close($curl);

    // décodage de la réponse json -> tableau PHP
    $reponse = json_decode($json_reponse, true);
    dump($reponse);
    dump($reponse['main']['temp']);
    return $reponse['weather'][0];
  }

}
