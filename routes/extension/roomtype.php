<?php
/**
 * Created by PhpStorm.
 * User: rahul
 * Date: 1/1/19
 * Time: 5:51 PM
 */

/*Admin USE*/
Route::group([
    'prefix' => '/roomtype',
    'middleware' => ['setTheme:' . config('themes.active_reactor'), 'web'],

], function () {

    Route::group([
        'middleware' => ['auth:admin'],

    ], function () {

        Route::get('/', [
            'uses' => '\Extension\Site\Http\Backend\RoomtypeController@index',
            'as' => 'reactor.roomtype.index',
        ]);


        Route::get('/create', [
            'uses' => '\Extension\Site\Http\Backend\RoomtypeController@create',
            'as' => 'reactor.roomtype.create',
        ]);

        Route::post('/create', [
            'uses' => '\Extension\Site\Http\Backend\RoomtypeController@store',
            'as' => 'reactor.roomtype.create',
        ]);

        Route::get('{id}/edit/{source?}', [
            'uses' => '\Extension\Site\Http\Backend\RoomtypeController@edit',
            'as' => 'reactor.roomtype.edit',
        ]);

        Route::put('{id}/edit/{source?}', [
            'uses' => '\Extension\Site\Http\Backend\RoomtypeController@update',
            'as' => 'reactor.roomtype.edit',
        ]);

        Route::get('/photo/{id}', [
            'uses' => '\Extension\Site\Http\Backend\RoomtypeController@getPhoto',
            'as' => 'reactor.roomtype.photo',
        ]);

        Route::post('/upload/photo', [
            'uses' => '\Extension\Site\Http\Backend\RoomtypeController@updatePhoto',
            'as' => 'reactor.roomtype.upload.photo',
        ]);

        Route::get('/delete/photo/{id}', [
            'uses' => '\Extension\Site\Http\Backend\RoomtypeController@photoDelete',
            'as' => 'reactor.roomtype.photo.delete',
        ]);



    });
});


