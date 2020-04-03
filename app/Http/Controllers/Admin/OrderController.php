<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\OrderProcessed;


class OrderController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function store(Request $request)
{
  $order = factory(\App\Admin::class)->create();


  $request->user()->notify(new OrderProcessed($order));


  return redirect()->route('home')->with('status', 'Order Placed!');
}
}
