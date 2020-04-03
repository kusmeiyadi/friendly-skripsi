<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisKasus extends Model
{
    public function pengaduan()
    {
        return $this->hasOne('App\Pengaduan');
    }

    protected $guarded = [];
}
