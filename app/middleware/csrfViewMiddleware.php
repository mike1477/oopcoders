<?php

   namespace App\middleware;

   /**
    *
    */
   class CsrfViewMiddleware extends Middleware
   {

     public function __invoke($request, $response, $next)
     {
      //Attach the tokens to the view
       $this->container->view->getEnvironment()->addGlobal('csrf', [
          'field' => '
          <input type="hidden" name="' . $this->container->csrf->getTokenNameKey() . '" value="' . $this->container->csrf->getTokenName() . '" >
          <input type="hidden" name="' . $this->container->csrf->getTokenValueKey() . '" value="' . $this->container->csrf->getTokenValue() . '" >
          ',
    ]);

      $response = $next($request, $response);
      return $response;
     }
   }
