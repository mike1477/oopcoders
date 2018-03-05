<?php

 namespace App\validation\Rules;

 use Respect\Validation\Rules\AbstractRule;
 use App\models\User;

 class EmailAvailable extends AbstractRule
 {
   public function validate($input)
   {
    // Return true or false - if email is already taken
    return User::where('email', $input)->count() === 0 ;
   }
 }
