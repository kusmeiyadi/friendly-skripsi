<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use App\Notifications\NewLessonNotification;
use App\Lesson;
use App\Admin;

class LessonController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }

  public function newLesson()
  {
    $lesson = new Lesson;
    $lesson->user_id = 2;
    $lesson->title   = 'Laravel Notification';
    $lesson->slug    = Str::slug('Laravel Notification');
    $lesson->body    = 'This is lesson we learn about notification on laravel 5.8.* with real time';
    $lesson->save();
    $user = Admin::where('id','!=',2)->get();

    Notification::send($user, new NewLessonNotification(Lesson::latest('id')->first()));
  }

  public function notification()
  {
    return auth()->user()->unreadNotifications;
  }

  public function markAsRead(Request $request)
  {
    $notification = auth()->user()->unreadNotifications->where('created_at', $request->create_lesson);
    if ($notification) {
      $notification->markAsRead();
    }
  }

  public function readLesson($lesson_id)
  {
    $lesson = Lesson::find([$lesson_id]);
    return view('lesson',compact('lesson'));
  }

  public function allMarkAsread()
  {
    auth()->user()->unreadNotifications->markAsRead();
  }

  public function readAllLesson()
  {
    $lessons = auth()->user()->readNotifications;
    return view('allLesson', compact('lessons'));
  }
}
