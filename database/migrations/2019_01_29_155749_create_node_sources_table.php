<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNodeSourcesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('node_sources', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('node_id')->unsigned()->nullable();
			$table->string('title');
			$table->string('node_name')->index();
			$table->string('locale', 16);
			$table->string('source_type');
			$table->string('meta_title')->nullable();
			$table->string('meta_keywords')->nullable()->index();
			$table->text('meta_description', 65535)->nullable();
			$table->string('meta_author')->nullable();
			$table->integer('meta_image')->unsigned()->nullable();
			$table->unique(['node_id','locale']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('node_sources');
	}

}
