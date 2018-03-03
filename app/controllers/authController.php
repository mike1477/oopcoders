<?php

  namespace App\controllers;

  use App\models\User;

  class authController extends Controller
  {
    function signUp($request, $response){

      return $this->container->view->render($response, 'signup.twig');
    }
  }
