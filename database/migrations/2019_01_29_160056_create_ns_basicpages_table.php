<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNsBasicpagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ns_basicpages', function(Blueprint $table)
		{
			$table->integer('id')->unsigned()->primary();
			$table->integer('node_id')->unsigned()->nullable()->index('ns_basicpages_node_id_foreign');
			$table->text('description', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ns_basicpages');
	}

}
