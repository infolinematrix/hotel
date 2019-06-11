<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMailingListsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mailing_lists', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->enum('type', array('mailchimp'));
			$table->string('from_name');
			$table->string('reply_to');
			$table->text('options', 65535);
			$table->string('external_id')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mailing_lists');
	}

}
