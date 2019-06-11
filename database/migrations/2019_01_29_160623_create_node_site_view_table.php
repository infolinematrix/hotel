<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNodeSiteViewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('node_site_view', function(Blueprint $table)
		{
			$table->integer('node_id')->unsigned();
			$table->integer('site_view_id')->unsigned()->index('node_site_view_site_view_id_foreign');
			$table->primary(['node_id','site_view_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('node_site_view');
	}

}
