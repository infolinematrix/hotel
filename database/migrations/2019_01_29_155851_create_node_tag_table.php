<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNodeTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('node_tag', function(Blueprint $table)
		{
			$table->integer('node_id')->unsigned();
			$table->integer('tag_id')->unsigned()->index('node_tag_tag_id_foreign');
			$table->primary(['node_id','tag_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('node_tag');
	}

}
