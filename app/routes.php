<?php

$app->get('/', 'homeController:index');

$app->get('/auth/signup', 'authController:signUp')->setName('signup');
$app->post('/auth/signup', 'authController:signUp');
