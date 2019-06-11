<?php

Route::get('/reviews', [
    'uses' => 'ReviewsController@index',
    'as' => 'reactor.reviews']);

Route::get('/review/change_status/{id}', [
    'uses' => 'ReviewsController@change_status',
    'as' => 'reactor.review.change_status']);

Route::get('/review/publish/{id}', [
    'uses' => 'ReviewsController@publish',
    'as' => 'reactor.reviews.publish']);

Route::get('/review/destroy/{id}', [
    'uses' => 'ReviewsController@destroy',
    'as' => 'reactor.reviews.destroy']);
