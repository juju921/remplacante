<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
	        $table->string('prenom');
            $table->string('email')->unique();
	        $table->string('avatar')->default('user.jpg');
	        $table->string('telephone');
	        $table->string('adresse');
	        $table->string('ville');
	        $table->float('lat');
	        $table->float('lng');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
	    Schema::table('users',function (Blueprint $table){
		    $table->integer('departement_id')->unsigned()->index();

	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
