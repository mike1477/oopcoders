<?php


namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Subcomment extends Model
{

  protected $fillable = [
         'username','comment_id','comment'
      ];


}
