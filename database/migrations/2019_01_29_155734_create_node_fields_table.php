<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNodeFieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('node_fields', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('node_type_id')->unsigned()->nullable()->index('node_fields_node_type_id_foreign');
			$table->string('name');
			$table->string('label');
			$table->text('description', 65535)->nullable();
			$table->float('position', 10, 0)->unsigned();
			$table->string('type');
			$table->boolean('visible')->default(1);
			$table->boolean('indexed')->default(0);
			$table->integer('search_priority')->default(0);
			$table->text('rules', 65535)->nullable();
			$table->text('default_value', 65535)->nullable();
			$table->text('options', 65535)->nullable();
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
		Schema::drop('node_fields');
	}

}
