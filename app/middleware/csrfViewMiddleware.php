<?php

   namespace App\middleware;

   /**
    *
    */
   class CsrfViewMiddleware extends Middleware
   {

     public function __invoke($request, $response, $next)
     {
  
     $token = (object)[];
     $token->nameKey = $this->container->csrf->getTokenNameKey();
     $token->name = $this->container->csrf->getTokenName();
     $token->valueKey = $this->container->csrf->getTokenValueKey();
     $token->value = $this->container->csrf->getTokenValue();

     $this->container->view->getEnvironment()->addGlobal('csrf',  json_encode($token));

      $response = $next($request, $response);
      return $response;
     }
   }
