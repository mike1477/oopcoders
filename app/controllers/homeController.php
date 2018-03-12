<?php

  namespace App\controllers;

  use App\models\User;

  use App\models\Video;
  use App\models\Category;

  class homeController extends Controller
  {
    function index($request, $response){
      $categories = Category::get()->all();
      $arr = [];
      //Seperate categories into there own arrays
       foreach ($categories as $category) {
         $videos = Video::where('category_id', $category->id)->get();
        array_push($arr, $videos);
       }
     //Store the Arrays of categories in a global var
     $this->container->view->getEnvironment()->addGlobal('arr', $arr);
      return $this->container->view->render($response, 'home.twig');
    }
  }
