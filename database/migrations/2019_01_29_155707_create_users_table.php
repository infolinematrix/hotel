<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->string('first_name', 50);
			$table->string('last_name', 50);
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->string('home')->nullable();
			$table->string('country', 100)->nullable();
			$table->string('phone', 15)->nullable();
			$table->enum('gender', array('Male','Female'))->default('Male');
			$table->date('dob')->nullable();
			$table->integer('pincode')->nullable();
			$table->string('city', 150)->nullable();
			$table->string('address', 250)->nullable();
			$table->boolean('status')->default(51);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
