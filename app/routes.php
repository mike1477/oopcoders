<?php

use App\middleware\authMiddleware;
use App\middleware\guestMiddleware;

$app->get('/', 'homeController:index')->setName('home');
$app->get('/video/{video_id}/{category_id}', 'videoController:index')->setName('video');
$app->post('/video/{video_id}/{category_id}', 'videoController:postComment');
$app->post('/reply/{video_id}/{category_id}/{comment_id}', 'videoController:postCommentReply');
$app->get('/deleteAllComments/{video_id}/{category_id}/{comment_id}', 'videoController:deleteAllComments');
$app->get('/deleteSubComment/{video_id}/{category_id}/{comment_id}', 'videoController:deleteSubComment');
//$app->get('/searchp', 'searchController:getSearchPage')->setName('tag');
$app->post('/searchp', 'searchController:searchTags')->setName('tag');
$app->post('/instsearch', 'searchController:intSearchTags');

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
