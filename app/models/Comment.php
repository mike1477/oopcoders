<?php


namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

  protected $fillable = [
          'user_id', 'video_id', 'comment'
      ];


}
