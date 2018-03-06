<?php

$app->get('/', 'homeController:index')->setName('home');
//Register new user
$app->get('/auth/signup', 'authController:getSignUp')->setName('signup');
$app->post('/auth/signup', 'authController:postSignUp');
//Login user
$app->get('/auth/signin', 'authController:getSignIn')->setName('signin');
$app->post('/auth/signin', 'authController:postSignIn');
