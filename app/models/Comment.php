<?php


namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

  protected $fillable = [
          'username', 'video_id', 'comment'
      ];


}
