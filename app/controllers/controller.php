<?php

 namespace App\controllers;


 class Controller{

   protected $container;
   public function __construct($container){
      $this->container = $container;
   }

   public function __get($property){
     var_dump($property);
   }

 }
