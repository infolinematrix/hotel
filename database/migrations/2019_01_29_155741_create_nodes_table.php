<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNodesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nodes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('node_type_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index('nodes_user_id_foreign');
			$table->integer('_lft')->unsigned();
			$table->integer('_rgt')->unsigned();
			$table->integer('parent_id')->unsigned()->nullable()->default(0);
			$table->boolean('mailing')->default(0)->index();
			$table->boolean('visible')->default(1);
			$table->boolean('sterile')->default(0);
			$table->boolean('home')->default(0)->index();
			$table->boolean('locked')->default(0);
			$table->string('layout', 150)->nullable();
			$table->integer('custom_field')->unsigned()->nullable()->index('IDX_CUSTOM_TYPE');
			$table->integer('status')->default(30);
			$table->boolean('hides_children')->default(0);
			$table->float('priority', 10, 0)->unsigned()->default(1);
			$table->dateTime('published_at')->nullable();
			$table->string('children_order')->default('_lft');
			$table->string('children_order_direction', 4)->default('asc');
			$table->enum('children_display_mode', array('tree','list'))->default('list');
			$table->timestamps();
			$table->index(['_lft','_rgt','parent_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nodes');
	}

}
