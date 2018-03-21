<?php

  namespace App\controllers;

  use App\models\Tag;



  class SearchController extends Controller
  {

    function searchTags($request, $response){
      $records = Tag::where('tag', 'like', '%'.$request->getParam('searchp').'%')->get();
      if(empty($records[0])){
        $this->container->view->getEnvironment()->addGlobal('search_results', false);
        return $this->container->view->render($response, 'search_page.twig');
      }else{
        $this->container->view->getEnvironment()->addGlobal('search_results', $records);
        return $this->container->view->render($response, 'search_page.twig');
      }
    }
  }
