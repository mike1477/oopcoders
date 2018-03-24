<?php

  namespace App\controllers;

  use App\models\Tag;



  class SearchController extends Controller
  {
    function intSearchTags($request, $response){

      $tagResponse = (object)[];
      $tagResponse->tag = Tag::where('tag', 'like', '%'.$request->getParam('searchValue').'%')->get();

      $token = (object)[];
      $token->nameKey = $this->container->csrf->getTokenNameKey();
      $token->name = $this->container->csrf->getTokenName();
      $token->valueKey = $this->container->csrf->getTokenValueKey();
      $token->value = $this->container->csrf->getTokenValue();

      $tagResponse->token = $token;

      echo json_encode($tagResponse);
    }
    
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
