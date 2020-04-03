<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Api;

class TelegramController extends Controller
{
  protected $telegram;

public function __construct()
{
  $this->telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
}

public function getMe()
{
  $response = $this->telegram->getMe();
  return $response;
}

public function setWebHook()
{
$url = 'https://localhost:8000/' . env('TELEGRAM_BOT_TOKEN') . '/webhook';
$response = $this->telegram->setWebhook(['url' => $url]);

return $response == true ? redirect()->back() : dd($response);
}
}
