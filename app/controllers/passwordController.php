<?php

  namespace App\controllers;

  use App\models\User;

  use Respect\Validation\Validator as v;

  class passwordController extends Controller
  {
     public function getChangedPassword($request, $response){
        return $this->container->view->render($response, 'changepassword.twig');
     }

     public function postChangedPassword($request, $response){
       // Validate form info
       $validation = $this->container->validator->validate($request, [
         'password_old' => v::noWhitespace()->notEmpty()->matchesPassword($this->container->auth->user()->password),
         'password_new'  => v::noWhitespace()->notEmpty(),

       ]);
       //If validation failed return back to change password page.
       if($validation->failed()){
         return $response->withRedirect($this->container->router->pathFor('changepassword'));
       }

        // Update password in database.
        $this->container->auth->user()->setPassword($request->getParam('password_new'));

        // Send flash message to user
        $this->container->flash->addMessage('success', 'Your password was changed.');

         //Go Home
         return $response->withRedirect($this->container->router->pathFor('home'));
     }
  }
