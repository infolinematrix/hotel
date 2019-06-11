<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToNodeSourcesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('node_sources', function(Blueprint $table)
		{
			$table->foreign('node_id', 'FK_NODE')->references('id')->on('nodes')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('node_sources', function(Blueprint $table)
		{
			$table->dropForeign('FK_NODE');
		});
	}

}
