<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Departement extends Model
{

	public function Regions(){
		return $this->hasMany('App\Region');
	}

	public function Users(){
		return $this->belongsTo('App\user');
	}




}
