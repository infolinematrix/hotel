<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('country', 50);
            $table->string('phone', 15);
            $table->string('gender', 6);
            $table->date('dob');
            $table->string('pincode', 6);
            $table->string('city', 50);
            $table->string('address', 150);
            $table->integer('status')->unsigned()->default(1);

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
