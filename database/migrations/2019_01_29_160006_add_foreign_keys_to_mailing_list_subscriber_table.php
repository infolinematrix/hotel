<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMailingListSubscriberTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mailing_list_subscriber', function(Blueprint $table)
		{
			$table->foreign('subscriber_id', 'mailing_list_subscriber_ibfk_1')->references('id')->on('subscribers')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('mailing_list_id')->references('id')->on('mailing_lists')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('mailing_list_subscriber', function(Blueprint $table)
		{
			$table->dropForeign('mailing_list_subscriber_ibfk_1');
			$table->dropForeign('mailing_list_subscriber_mailing_list_id_foreign');
		});
	}

}
