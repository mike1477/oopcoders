<?php

  namespace App\controllers;

  use App\models\User;

  use Respect\Validation\Validator as v;

  class authController extends Controller
  {
    public function getSignUp($request, $response){
      return $this->container->view->render($response, 'signup.twig');
    }

    public function postSignUp($request, $response){

      // Validate form info
      $validation = $this->container->validator->validate($request, [
        'email' => v::noWhitespace()->notEmpty()->email()->emailAvailable(),
        'name'  => v::notEmpty()->alpha(),
        'password' => v::noWhitespace()->notEmpty(),
      ]);
      //If validation failed return back to sign up page.
      if($validation->failed()){
        return $response->withRedirect($this->container->router->pathFor('signup'));
      }
       // Add new user to database.
      $user =  User::create([
          'email' => $request->getParam('email'),
          'name' => $request->getParam('name'),
          'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT),
        ]);

       // Authenticate User and sign them in
       $this->container->auth->attempt($user->email, $request->getParam('password'));

        //Go Home
        return $response->withRedirect($this->container->router->pathFor('home'));
    }

    public function getSignIn($request, $response){
        return $this->container->view->render($response, 'signin.twig');
    }

    public function postSignIn($request, $response){

        //Validate form info
        $validation = $this->container->validator->validate($request, [
          'email' => v::noWhitespace()->notEmpty()->email()->emailAvailable(),
          'password' => v::noWhitespace()->notEmpty(),
        ]);

        $auth = $this->container->auth->attempt(
          $request->getParam('email'),
          $request->getParam('password')
        );

        if(!$auth){
          return $response->withRedirect($this->container->router->pathFor('signin'));
        }

          return $response->withRedirect($this->container->router->pathFor('home'));
    }
  }
