<?php

Route::group(['middleware' => ['track', 'setTheme:' . config('themes.active')]], function () {

    // Home
    Route::get('/', [
        'as' => 'site.home',
        'uses' => 'SiteController@getHome']);

    // Contact Us
    Route::get('/contact', ['as' => 'site.contact', 'uses' => 'SiteController@getContact']);
    Route::post('/contact', ['as' => 'site.contact', 'uses' => 'SiteController@postContact']);


    // Search
    Route::get('/search', ['as' => 'search', 'uses' => 'SiteController@SearchByTags']);

    // Page (Static)
    Route::get('/page/{slug}', ['as' => 'page', 'uses' => 'SiteController@getPage']);

    /**
     * Include All routes
     * from Routes Folder
     */
    require 'member.php';

});