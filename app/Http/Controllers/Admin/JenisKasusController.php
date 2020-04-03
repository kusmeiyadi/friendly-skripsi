<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Post;
use App\JenisKasus;
use Alert;

class JenisKasusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $jeniskasuss = JenisKasus::all();
        return view('admin.jeniskasus.jeniskasus', compact('jeniskasuss'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis_kasus' => 'required|string|max:100',
        ]);

        $jenis_kasus = JenisKasus::firstOrCreate(['jenis_kasus' => $request->jenis_kasus]);
        toast('Your Post as been submited!','success','top-right');
        return redirect()->back();
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

    public function destroy($id)
    {
        $jenis_kasus = JenisKasus::findOrFail($id);
        $jenis_kasus->delete();
        toast('Jenis Kasus ' . $jenis_kasus->jenis_kasus. ' as been deleted!','success','top-right');
        return redirect()->back();
    }
}
