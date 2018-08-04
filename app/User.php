<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
	use Notifiable, HasApiTokens;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'nom', 'prenom','email', 'telephone', 'avatar','password', 'adresse' ,'ville','lat','lng','departement_id',
	];



	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function Departements(){
		return $this->hasMany('App\Departement');
	}

	public function comments()
	{
		return $this->hasMany('App\Comment');
	}

	public function roles()
	{
		return $this->belongsToMany(Role::class);
	}


}
