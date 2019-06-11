<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToNodeSiteViewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('node_site_view', function(Blueprint $table)
		{
			$table->foreign('node_id', 'FK_NODE_VIEW')->references('id')->on('nodes')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('node_site_view', function(Blueprint $table)
		{
			$table->dropForeign('FK_NODE_VIEW');
		});
	}

}
