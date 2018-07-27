<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    //
	public function Departement(){
		return $this->belongsTo('App\Departement');
	}
}
