<?php

   namespace App\middleware;

   /**
    *
    */
   class AuthMiddleware extends Middleware
   {

     public function __invoke($request, $response, $next)
     {
       if (!$this->container->auth->check()) {
          $this->container->flash->addMessage('error', 'Please sign in before doing that.');
          return $response->withRedirect($this->container->router->pathFor('signin'));
       }
      $response = $next($request, $response);
      return $response;
     }
   }
