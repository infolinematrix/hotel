<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('media', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('node_id')->unsigned()->default(0)->index('node_id_2');
			$table->string('path');
			$table->string('name');
			$table->string('extension');
			$table->string('mimetype');
			$table->bigInteger('size')->unsigned();
			$table->text('metadata', 65535)->nullable();
			$table->string('type')->nullable()->index();
			$table->integer('user_id')->unsigned();
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
		Schema::drop('media');
	}

}
