<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface as Container;

class PacController extends Controller{
    
    public function __construct(Container $container){

        //container instance by dependency injection
        $this->container=$container;

        //config by default
        $this->config=$this->container['config'];
        $this->bigquery=$this->container['bigquery']($this->config->google('bigquery'));
        $this->modules['pac']=$this->container['pac']($this->bigquery);

    }

    public function index($request,$response,$args){

        $index=$this->modules['pac']->index();

        //imprimimos resultado como json con cabeceras
        $response1 = $response->withJson($index,201);
        $response2 = $response1
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');

        //imprimimos respuesta al retornarla
        return $response2;

    }

    public function billNo($request,$response,$args){

        $index=$this->modules['pac']->billNo();

        //imprimimos resultado como json con cabeceras
        $response1 = $response->withJson($index,201);
        $response2 = $response1
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');

        //imprimimos respuesta al retornarla
        return $response2;

    }


    public function month($request,$response,$args){

        //month dataset
        $result = [
            0=>["id"=>3,"month"=>"March"],
            1=>["id"=>4,"month"=>"April"],
            2=>["id"=>5,"month"=>"May"]
        ];

        //imprimimos resultado como json con cabeceras
        $response1 = $response->withJson($result,201);
        $response2 = $response1
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');

        //imprimimos respuesta al retornarla
        return $response2;

    }

    public function trxCode($request,$response,$args){

        $index=$this->modules['pac']->trxCode();

        //imprimimos resultado como json con cabeceras
        $response1 = $response->withJson($index,201);
        $response2 = $response1
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');

        //imprimimos respuesta al retornarla
        return $response2;

    }

    public function room($request,$response,$args){

        $index=$this->modules['pac']->room();

        //imprimimos resultado como json con cabeceras
        $response1 = $response->withJson($index,201);
        $response2 = $response1
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');

        //imprimimos respuesta al retornarla
        return $response2;

    }

    public function date($request,$response,$args){

        $index=$this->modules['pac']->date();

        //imprimimos resultado como json con cabeceras
        $response1 = $response->withJson($index,201);
        $response2 = $response1
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');

        //imprimimos respuesta al retornarla
        return $response2;

    }

    public function fiscalBillNo($request,$response,$args){

        $index=$this->modules['pac']->fiscalBillNo();

        //imprimimos resultado como json con cabeceras
        $response1 = $response->withJson($index,201);
        $response2 = $response1
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');

        //imprimimos respuesta al retornarla
        return $response2;

    }

    public function taxInclusiveYn($request,$response,$args){

        $index=$this->modules['pac']->taxInclusiveYn();

        //imprimimos resultado como json con cabeceras
        $response1 = $response->withJson($index,201);
        $response2 = $response1
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');

        //imprimimos respuesta al retornarla
        return $response2;

    }

    public function tcGroup($request,$response,$args){

        $index=$this->modules['pac']->tcGroup();

        //imprimimos resultado como json con cabeceras
        $response1 = $response->withJson($index,201);
        $response2 = $response1
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');

        //imprimimos respuesta al retornarla
        return $response2;

    }

    public function tcSubgroup($request,$response,$args){

        $index=$this->modules['pac']->tcSubgroup();

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
