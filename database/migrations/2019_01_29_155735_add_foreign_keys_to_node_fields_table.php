<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToNodeFieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('node_fields', function(Blueprint $table)
		{
			$table->foreign('node_type_id', 'FK_NODE_TYPE_FIELDS')->references('id')->on('node_types')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('node_fields', function(Blueprint $table)
		{
			$table->dropForeign('FK_NODE_TYPE_FIELDS');
		});
	}

}
