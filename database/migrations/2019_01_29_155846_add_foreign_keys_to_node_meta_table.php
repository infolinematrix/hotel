<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToNodeMetaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('node_meta', function(Blueprint $table)
		{
			$table->foreign('node_id', 'FK_NODE_META')->references('id')->on('nodes')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('node_meta', function(Blueprint $table)
		{
			$table->dropForeign('FK_NODE_META');
		});
	}

}
