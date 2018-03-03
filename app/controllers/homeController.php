<?php

  namespace App\controllers;

  use App\models\User;

  class homeController extends Controller
  {
    function index($request, $response){

      return $this->container->view->render($response, 'home.twig');
    }
  }
