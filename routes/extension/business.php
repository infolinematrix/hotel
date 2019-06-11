<?php
/**
 * Created by PhpStorm.
 * User: rahul
 * Date: 1/1/19
 * Time: 5:51 PM
 */

/*Admin USE*/
Route::group([
    'prefix' => '/business',
    'middleware' => ['setTheme:' . config('themes.active_reactor'), 'web'],

], function () {

    Route::group([
        'middleware' => ['auth:admin'],

    ], function () {

        Route::get('/', [
            'uses' => '\Extension\Site\Http\Backend\BusinessController@index',
            'as' => 'reactor.business.index',
        ]);

        Route::get('/import', [
            'uses' => '\Extension\Site\Http\Backend\BusinessController@import',
            'as' => 'reactor.business.import',
        ]);

        Route::post('/import', [
            'uses' => '\Extension\Site\Http\Backend\BusinessController@import_store',
            'as' => 'reactor.business.import',
        ]);

        Route::get('/create', [
            'uses' => '\Extension\Site\Http\Backend\BusinessController@create',
            'as' => 'reactor.business.create',
        ]);

        Route::post('/create', [
            'uses' => '\Extension\Site\Http\Backend\BusinessController@store',
            'as' => 'reactor.business.create',
        ]);

        Route::get('{id}/edit/{source?}', [
            'uses' => '\Extension\Site\Http\Backend\BusinessController@edit',
            'as' => 'reactor.business.edit',
        ]);

        Route::put('{id}/edit/{source?}', [
            'uses' => '\Extension\Site\Http\Backend\BusinessController@update',
            'as' => 'reactor.business.edit',
        ]);

        Route::get('/photo/{id}', [
            'uses' => '\Extension\Site\Http\Backend\BusinessController@getPhoto',
            'as' => 'reactor.business.photo',
        ]);

        Route::post('/upload/photo', [
            'uses' => '\Extension\Site\Http\Backend\BusinessController@updatePhoto',
            'as' => 'reactor.business.upload.photo',
        ]);

        Route::get('appointments', [
            'uses' => '\Extension\Site\Http\Backend\BusinessController@appointments',
            'as' => 'reactor.appointment',
        ]);

        Route::get('contacts', [
            'uses' => '\Extension\Site\Http\Backend\BusinessController@contacts',
            'as' => 'reactor.contact',
        ]);

    });
});


