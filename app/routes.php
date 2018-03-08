<?php

use App\middleware\authMiddleware;
use App\middleware\guestMiddleware;

$app->get('/', 'homeController:index')->setName('home')->setName('home');

$app->group('', function(){
  //Register new user
  $this->get('/auth/signup', 'authController:getSignUp')->setName('signup');
  $this->post('/auth/signup', 'authController:postSignUp');
  //Login user
  $this->get('/auth/signin', 'authController:getSignIn')->setName('signin');
  $this->post('/auth/signin', 'authController:postSignIn');
})->add(new GuestMiddleware($container));


$app->group('' , function(){
  //Logout user
  $this->get('/auth/signout', 'authController:getSignOut')->setName('signout');
  //Change password
  $this->get('/auth/changepassword', 'passwordController:getChangedPassword')->setName('changepassword');
  $this->post('/auth/changepassword', 'passwordController:postChangedPassword');
})->add(new AuthMiddleware($container));
