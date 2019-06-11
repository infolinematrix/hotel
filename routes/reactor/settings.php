<?php


Route::get('/settings', [
    'uses' => 'SettingsController@index',
    'as' => 'reactor.settings']);

Route::post('/settings', [
    'uses' => 'SettingsController@store',
    'as' => 'reactor.settings.store']);