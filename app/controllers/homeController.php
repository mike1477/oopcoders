<?php

  namespace App\controllers;

  class homeController extends Controller
  {
    function index($request, $response){

      return $this->container->view->render($response, 'app.twig');
    }
  }
