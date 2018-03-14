<?php

  namespace App\controllers;

  use App\models\User;

  use App\models\Video;
  use App\models\Category;

  class videoController extends Controller
  {
    function index($request, $response){

      return $this->container->view->render($response, 'videos.twig');
    }
  }
