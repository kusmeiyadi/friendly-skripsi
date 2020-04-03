<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public function posts()
  {
    return $this->belongsToMany('App\Model\User\Post','category_posts');
  }
}
