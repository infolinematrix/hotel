<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubscribersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subscribers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email')->unique();
			$table->string('name', 128)->nullable();
			$table->string('address')->nullable();
			$table->string('city', 64)->nullable();
			$table->string('country', 64)->nullable();
			$table->string('postal_code', 16)->nullable();
			$table->string('nationality', 64)->nullable();
			$table->string('national_id', 64)->nullable();
			$table->string('tel', 32)->nullable();
			$table->string('tel_mobile', 32)->nullable();
			$table->string('fax', 32)->nullable();
			$table->text('additional', 65535)->nullable();
			$table->boolean('unsubscribe')->default(0);
			$table->string('unsubscribe_reason', 150)->nullable();
			$table->text('unsubscribe_comment', 65535)->nullable();
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
		Schema::drop('subscribers');
	}

}
