<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    public function jenis_kasus()
    {
        return $this->belongsTo('App\JenisKasus');
    }

    public function pelapor()
    {
        return $this->belongsTo('App\Pelapor');
    }

    protected $guarded = [];
}
