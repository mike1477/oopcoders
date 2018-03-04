<?php

   namespace App\middleware;

   /**
    *
    */
   class ValidationErrorsMiddleware extends Middleware
   {

     public function __invoke($request, $response, $next)
     {
       // If session error isset , set a global varible so we can use it in the view.
       if(isset($_SESSION['errors'])){
         $this->container->view->getEnvironment()->addGlobal('errors', $_SESSION['errors']);
         unset($_SESSION['errors']);
       }

       $response = $next($request, $response);
       return $response;
     }
   }
