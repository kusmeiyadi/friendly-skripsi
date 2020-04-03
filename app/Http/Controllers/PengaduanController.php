<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use App\Notifications\NewPengaduanNotification;
use App\Pengaduan;
use App\Admin;
use App\JenisKasus;
use App\Pelapor;
use App\Korban;
use App\Terlapor;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create()
    {
        $jenis_kasus = JenisKasus::orderBy('jenis_kasus', 'ASC')->get();
        return view('pengaduan', compact('jenis_kasus'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
          'kode' => 'required',
          'title' => 'required',
          'kronologi' => 'required',
          'jenis_kasus' => 'required',
          // PELAPOR
          'nama_p' => 'required',
          'kontak_p' => 'required',
          'nama_k' => 'required',
          'nama_t' => 'required',
        ]);

        $pelapor = Pelapor::create([
          'nama_p' => $request->nama_p,
          'kontak_p' => $request->kontak_p,
        ]);

        if (count($request->nama_k) > 0)
        {
          foreach ($request->nama_k as $korban=>$k){
            $korban = Korban::create([
              'nama_k' => $request->nama_k[$korban],
              'pelapor_id' => $pelapor->id,
            ]);
          }
        }

        if (count($request->nama_t) > 0)
        {
          foreach ($request->nama_t as $terlapor=>$t){
            $terlapor = Terlapor::create([
              'nama_t' => $request->nama_t[$terlapor],
              'pelapor_id' => $pelapor->id,
            ]);
          }
        }

        $pengaduan = Pengaduan::create([
          'kode' => $request->kode,
          'jenis_kasus_id' => $request->jenis_kasus,
          'pelapor_id' => $pelapor->id,
          'user_id' => 2,
          'title' => $request->title,
          'slug' => Str::slug($request->title),
          'kronologi' => $request->kronologi,
        ]);

        $user = Admin::where('id','!=',2)->get();

        Notification::send($user, new NewPengaduanNotification(Pengaduan::latest('id')->first()));

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
