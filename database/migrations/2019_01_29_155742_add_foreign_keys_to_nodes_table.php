<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToNodesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('nodes', function(Blueprint $table)
		{
			$table->foreign('node_type_id', 'FK_NODE_TYPE')->references('id')->on('node_types')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_id', 'nodes_ibfk_1')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('nodes', function(Blueprint $table)
		{
			$table->dropForeign('FK_NODE_TYPE');
			$table->dropForeign('nodes_ibfk_1');
		});
	}

}
