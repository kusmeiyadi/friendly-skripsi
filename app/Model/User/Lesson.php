<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['kode','user_id','title','slug','body'];
}
