<?php

 namespace App\auth;

 use App\models\User;

 class Auth
 {
   public function attempt($email, $password)
   {
     $user = User::where('email', $email)->first();

     if(!$user){
       return false;
     }

     if(password_verify($password, $user->password)){
       $_SESSION['user'] = $user->id;
       return true;
     }

     return false;

   }

 }
