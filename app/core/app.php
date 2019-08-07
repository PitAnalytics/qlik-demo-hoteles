<?php
//
/************************/
/*****PSR-7-INTERFACE****/
/************************/
//
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
//
/************************/
/*****SLIM-INSTANCE******/
/************************/
//
$app = new \Slim\App(['settings' => ['displayErrorDetails' => true,'responseChunkSize' => 10096]]);
//
/*********************/
/******CONTAINER******/
/*********************/
//
require_once '../app/core/container.php';
//
/******************/
/****ROUTER********/
/******************/
//
$app->get('/', \App\Controllers\TestController::class.':wellcome');
$app->get('/pac', \App\Controllers\PacController::class.':index');
$app->get('/bill-no', \App\Controllers\PacController::class.':billNo');
$app->get('/month', \App\Controllers\PacController::class.':month');
$app->get('/date', \App\Controllers\PacController::class.':date');
$app->get('/trx-code', \App\Controllers\PacController::class.':trxCode');
$app->get('/room', \App\Controllers\PacController::class.':room');
$app->get('/fiscal-bill-no', \App\Controllers\PacController::class.':fiscalBillNo');
//
$app->get('/group/tc-group', \App\Controllers\PacGroupController::class.':tcGroup');
$app->get('/group/trx-code', \App\Controllers\PacGroupController::class.':trxCode');
$app->get('/group/tc-subgroup', \App\Controllers\PacGroupController::class.':tcSubgroup');
//
/******************/
/****EJECUTAMOS****/
/******************/
//
$app->run();

?>
