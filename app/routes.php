<?php

$app->get('/', 'homeController:index')->setName('home');

$app->get('/auth/signup', 'authController:getSignUp')->setName('signup');
$app->post('/auth/signup', 'authController:postSignUp');
