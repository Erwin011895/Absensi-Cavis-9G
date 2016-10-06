<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cavis extends Model
{
	protected $fillable = ['nim', 'name'];

    public function pickets()
    {
    	return $this->hasMany('App\Picket');
    }
}
