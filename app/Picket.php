<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picket extends Model
{
	protected $fillable = ['random_text'];
    public function cavis()
    {
        return $this->belongsTo('App\Cavis');
    }
}
