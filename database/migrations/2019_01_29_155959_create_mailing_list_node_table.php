<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMailingListNodeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mailing_list_node', function(Blueprint $table)
		{
			$table->integer('mailing_list_id')->unsigned();
			$table->integer('node_id')->unsigned()->index('mailing_list_node_node_id_foreign');
			$table->string('external_mailing_id')->nullable();
			$table->primary(['mailing_list_id','node_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mailing_list_node');
	}

}
