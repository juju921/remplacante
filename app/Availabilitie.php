<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Availabilitie extends Model
{

	protected $fillable = [
		 'from_id', 'to_id', 'start_date', 'end_data'
	];

	public function from () {
		return $this->belongsTo(User::class, 'from_id');
	}
}
