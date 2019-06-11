<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_profile', function(Blueprint $table)
		{
			$table->integer('user_id')->primary();
			$table->string('phone', 15);
			$table->string('gender', 6);
			$table->boolean('newsletter')->default(1);
			$table->text('address', 65535)->nullable();
			$table->string('pincode', 6)->nullable();
			$table->string('region', 25)->nullable();
			$table->string('city', 25)->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_profile');
	}

}
