<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Departement;
use App\Region;
use Request;
use Jcf\Geocode\Facades\Geocode;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {



	    //	->results[0]->address_components[2]->long_name
	    return Validator::make($data, [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
	        'adresse'=> 'required|string|max:255',
            'telephone'=> 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

	    $param = array('address'=>Request::input('adresse'));

	    $response = \Geocoder::geocode('json', $param);
	    $location = json_decode($response);
	    //dd($location);

	    $city = "";
	    $state = "";
	    $country = "";
	    $numero = "";
	    $rue="";
	    $ville="";

	    //break up the components
	    $address = $location->results[0]->formatted_address;
	    $arrComponents = $location->results[0]->address_components;

	    foreach($arrComponents as $index=>$component) {
		    $type = $component->types[0];

		    if ($numero == "" && ($type == "street_number") ) {
			    $numero = $component->short_name;
		    }
		    if ($rue == "" && ($type == "route") ) {
			    $rue = $numero. ' '  .$component->short_name;
		    }

		    if ($ville == "" && ($type == "locality") ) {
			    $ville = $component->short_name;
		    }

		    if ($city == "" && ($type == "administrative_area_level_2") ) {
			    $city = $component->short_name;
		    }
		    if ($state == "" && $type=="administrative_area_level_1") {
			    $state = $component->short_name;
		    }

		    if ($city != "" && $state != "" && $country != "") {
			    //we're done
			    break;
		    }
	    }
	    $lat = $location->results[0]->geometry->location->lat;
	    $lng = $location->results[0]->geometry->location->lng;
	    $arrReturn = array("departement"=>$city, "region"=>$state);
	    $departement = Departement::where('nom', $city)->get()->first();
	        //dd($city);
	   $departements = $departement->id;
	   //dd($departements);







        return User::create([
            'nom' => $data['nom'],
            'prenom'=>$data['prenom'],
	        'adresse'=>$rue,
            'ville'=>$city,
            'telephone'=>$data['telephone'],
            'lat'=>$lat,
            'lng'=>$lng,
            'email' => $data['email'],

            'departement_id'=> $departements,
            'password' => Hash::make($data['password']),
        ]);
    }
}
