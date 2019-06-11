<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMailingListNodeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mailing_list_node', function(Blueprint $table)
		{
			$table->foreign('mailing_list_id')->references('id')->on('mailing_lists')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('node_id')->references('id')->on('nodes')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('mailing_list_node', function(Blueprint $table)
		{
			$table->dropForeign('mailing_list_node_mailing_list_id_foreign');
			$table->dropForeign('mailing_list_node_node_id_foreign');
		});
	}

}
