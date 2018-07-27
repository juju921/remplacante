<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Provider\fr_FR\Address;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    $faker = Faker\Factory::create();


	    for ($i = 0; $i < 10; $i++) {
		    $user = new User;
		    $user->nom = $faker->lastName;
		    $user->prenom = $faker->firstName;
		    $user->email = $faker->unique()->email;
		    $user->password = bcrypt('123456');
		    $user->telephone = $faker->phoneNumber;
		    $user->avatar = $faker->imageUrl(600, 400, 'cats');
		    $user->ville = $faker->city;
		    $user->adresse = $faker->address;
		    $user->lat = $faker->latitude;
		    $user->lng = $faker->longitude;
		    $user->departement_id = "32";
		    $user->save();
	    }




    }
}
