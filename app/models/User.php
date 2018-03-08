<?php


namespace App\models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  protected $fillable = [
    'email',
    'name',
    'password',
  ];

  public function setPassword($password)
  {
    $this->update([
      'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);
  }

}
