<?php

Route::group(['middleware' => ['track', 'setTheme:' . config('themes.active')]], function () {

    // Home
    Route::get('/', [
        'as' => 'site.home',
        'uses' => 'SiteController@getHome']);

    // Contact Us
    Route::get('/contact', ['as' => 'site.contact', 'uses' => 'SiteController@getContact']);
    Route::post('/contact', ['as' => 'site.contact', 'uses' => 'SiteController@postContact']);

    // Testing Routes
    Route::get('/browse', ['as' => 'site.browse', 'uses' => 'SiteController@browse']);
    Route::get('/single', ['as' => 'site.single', 'uses' => 'SiteController@single']);

    // Browse by Location and Category
    Route::get('/browse/{slug}', ['as' => 'browse', 'uses' => 'SiteController@getBrowse']);
    Route::get('/profile/{slug}', ['as' => 'profile', 'uses' => 'SiteController@getProfile']);
    Route::post('/book/appointment', ['as' => 'book.appointment', 'uses' => 'SiteController@booking']);
    Route::post('/profile/review', ['as' => 'profile.review', 'uses' => 'SiteController@postReview']);


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