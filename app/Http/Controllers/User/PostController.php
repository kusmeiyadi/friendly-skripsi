<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Post;

class PostController extends Controller
{
    public function post(post $post){

      return view('user.post',compact('post'));

    }
}
