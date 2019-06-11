<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMailingListSubscriberTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mailing_list_subscriber', function(Blueprint $table)
		{
			$table->integer('subscriber_id')->unsigned();
			$table->integer('mailing_list_id')->unsigned()->index('mailing_list_subscriber_mailing_list_id_foreign');
			$table->primary(['subscriber_id','mailing_list_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mailing_list_subscriber');
	}

}
