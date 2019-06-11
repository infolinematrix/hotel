<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodeMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('node_meta', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('node_id')->unsigned();
            $table->foreign('node_id')
                ->references('id')
                ->on('nodes')
                ->onDelete('cascade');

            $table->string('type');
            $table->string('key');
            $table->integer('value')->unsigned();
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
        Schema::dropIfExists('node_meta');
    }
}
