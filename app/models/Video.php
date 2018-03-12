<?php


namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

  protected $fillable = [
          'title', 'description','length','created_at','video','thumbnail','category_id'
      ];


}
