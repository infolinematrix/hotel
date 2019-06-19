<?php

Route::get('/blogs', [
    'uses' => 'BlogController@index',
    'as' => 'reactor.blogs.index']);

Route::get('/blogs/create', [
    'uses' => 'BlogController@create',
    'as' => 'reactor.blogs.create']);

Route::post('/blogs/create', [
    'uses' => 'BlogController@store',
    'as' => 'reactor.blogs.store']);

Route::get('/blogs/{id}/edit/{source?}', [
    'uses' => 'BlogController@edit',
    'as' => 'reactor.blogs.edit']);

Route::put('/blogs/{id}/edit/{source}', [
    'uses' => 'BlogController@update',
    'as' => 'reactor.blogs.update']);

//--Translation
Route::get('/blogs/{id}/translate', [
    'uses' => 'BlogController@createTranslation',
    'as' => 'reactor.blogs.translation.create']);

Route::post('/blogs/{id}/translate', [
    'uses' => 'BlogController@storeTranslation',
    'as' => 'reactor.blogs.translation.store']);

Route::delete('/blogs/translation/{id}', [
    'uses' => 'BlogController@destroyTranslation',
    'as' => 'reactor.blogs.translation.destroy']);
