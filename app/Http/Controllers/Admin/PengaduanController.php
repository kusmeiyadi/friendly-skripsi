<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Notifications\NewLessonNotification;
use App\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Alert;
use App\Mail\KPPADEmail;
use Illuminate\Support\Facades\Mail;
use Nexmo\Laravel\Facade\Nexmo;
use Facades\Yugo\SMSGateway\SMS;

class PengaduanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $pengaduans = Pengaduan::orderBy('created_at', 'DESC')->get();
        return view('admin.pengaduan.pengaduan', compact('pengaduans'));
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::find($id);
        return view('admin.pengaduan.detail',compact('pengaduan'));
    }

    public function pending()
    {
      $pengaduans = Pengaduan::where('is_approved', false)->get();
      return view('admin.pengaduan.pending',compact('pengaduans'));
    }

    public function approval($id)
    {
      $pengaduan = Pengaduan::find($id);
      if ($pengaduan->is_approved == false)
      {
        $pengaduan->is_approved = true;
        $pengaduan->save();
      toast('Your Post as been submited!','success','top-right');
      } else {
        toast('Your Post as been submited!','success','top-right');
      }

      return redirect(route('pengaduans.index'));
    }

    public function email($id)
    {
        $pengaduan = Pengaduan::find($id);
        Mail::to($pengaduan->pelapor->kontak_p)->send(new KPPADEmail($pengaduan));

        toast('Pesan Sudah Terkirim Ke Email Pelapor','success','top-right');
        return redirect(route('pengaduans.index'));
    }

    public function sms(Request $request)
    {
        SMS::send(['082358177119'], 'Hello, world! How are you today?');

        toast('Pesan Sudah Terkirim Ke Email Pelapor','success','top-right');
        return redirect()->back();
    }

    public function sms_view()
    {
        return view('sms');
    }

    public function notification()
    {
        return auth()->user()->unreadNotifications;
    }

    public function markAsRead(Request $request)
    {
        $notification = auth()->user()->unreadNotifications->where('created_at', $request->create_pengaduan);
        if ($notification) {
          $notification->markAsRead();
        }
    }

    public function readPengaduan($pengaduan_id)
    {
      $pengaduan = Pengaduan::find([$pengaduan_id]);
      return view('admin.pengaduan.view',compact('pengaduan'));
    }

    public function allMarkAsread()
    {
      auth()->user()->unreadNotifications->markAsRead();
    }

    public function readAllPengaduan()
    {
      $pengaduans = auth()->user()->readNotifications;
      return view('admin.pengaduan.allPengaduan', compact('pengaduans'));
    }

}
