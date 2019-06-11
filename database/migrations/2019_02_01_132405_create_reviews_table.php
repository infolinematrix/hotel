<?php

declare(strict_types = 1);


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->integer('rating');
            $table->morphs('reviewable');
            $table->morphs('author');

            $table->integer('customer_service_rating');
            $table->integer('quality_rating');
            $table->integer('friendly_rating');
            $table->integer('price_rating');
            $table->boolean('recommend')->default(false);
            $table->boolean('approved')->default(true); // This is optional and defaults to false

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
