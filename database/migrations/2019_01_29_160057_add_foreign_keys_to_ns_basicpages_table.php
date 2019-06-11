<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToNsBasicpagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ns_basicpages', function(Blueprint $table)
		{
			$table->foreign('id')->references('id')->on('node_sources')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('node_id')->references('id')->on('nodes')->onUpdate('RESTRICT')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ns_basicpages', function(Blueprint $table)
		{
			$table->dropForeign('ns_basicpages_id_foreign');
			$table->dropForeign('ns_basicpages_node_id_foreign');
		});
	}

}
