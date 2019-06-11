<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediaTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('media_translations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('media_id')->unsigned();
			$table->string('locale')->index();
			$table->string('caption');
			$table->text('description', 65535);
			$table->string('alttext');
			$table->unique(['media_id','locale']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('media_translations');
	}

}
