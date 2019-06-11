<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNodeMetaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('node_meta', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('node_id')->unsigned()->default(0)->index('IDX_NODE_ID');
			$table->string('type', 20)->nullable();
			$table->string('key', 20);
			$table->text('value', 65535)->nullable();
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
		Schema::drop('node_meta');
	}

}
