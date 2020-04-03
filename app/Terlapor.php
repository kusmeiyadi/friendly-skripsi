<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terlapor extends Model
{
    public function pelapor()
    {
      return $this->belongsTo('App\Pelapor');
    }

    protected $guarded = [];
}
