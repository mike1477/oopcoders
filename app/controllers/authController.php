<?php

  namespace App\controllers;

  use App\models\User;

  class authController extends Controller
  {
    public function getSignUp($request, $response){

      return $this->container->view->render($response, 'signup.twig');
    }

    public function postSignUp($request, $response){

    $user =  User::create([
        'email' => $request->getParam('email'),
        'name' => $request->getParam('name'),
        'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT),
      ]);

      return $response->withRedirect($this->container->router->pathFor('home'));
    }
  }
