<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface as Container;

class HotelController extends Controller{
    
  public function __construct(Container $container){

    //container instance by dependency injection
    $this->container=$container;

    //config by default
    $this->config=$this->container['config'];
    $this->bigquery=$this->container['bigquery']($this->config->google('bigquery'));
    $this->modules['hotel']=$this->container['hotel']($this->bigquery);

  }

  public function index($request,$response,$args){

    $index=$this->modules['hotel']->index();

    //imprimimos resultado como json con cabeceras
    $response1 = $response->withJson($index,201);
    $response2 = $response1
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');

    //imprimimos respuesta al retornarla
    return $response2;

  }

}

?>
