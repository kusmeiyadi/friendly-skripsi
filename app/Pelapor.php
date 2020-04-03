<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelapor extends Model
{
    public function pengaduan()
    {
        return $this->hasOne('App\Pengaduan');
    }

    public function korban()
    {
        return $this->hasMany('App\Korban');
    }

    public function terlapor()
    {
        return $this->hasMany('App\Terlapor');
    }
    
    protected $guarded = [];
}
