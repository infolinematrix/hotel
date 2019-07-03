<?php
/**
 * Created by PhpStorm.
 * User: rahul
 * Date: 1/1/19
 * Time: 5:51 PM
 */

/*Admin USE*/
Route::group([
    'prefix' => '/travel',
    'middleware' => ['setTheme:' . config('themes.active_reactor'), 'web'],

], function () {

    Route::group([
        'middleware' => ['auth:admin'],

    ], function () {

        Route::get('/package', [
            'uses' => '\Extension\Site\Http\Backend\TravelPackageController@index',
            'as' => 'reactor.travelpackage.index',
        ]);


        Route::get('/package/create', [
            'uses' => '\Extension\Site\Http\Backend\TravelPackageController@create',
            'as' => 'reactor.travelpackage.create',
        ]);

        Route::post('/package/create', [
            'uses' => '\Extension\Site\Http\Backend\TravelPackageController@store',
            'as' => 'reactor.travelpackage.create',
        ]);

        Route::get('{id}/package/edit/{source?}', [
            'uses' => '\Extension\Site\Http\Backend\TravelPackageController@edit',
            'as' => 'reactor.travelpackage.edit',
        ]);

        Route::put('{id}/package/edit/{source?}', [
            'uses' => '\Extension\Site\Http\Backend\TravelPackageController@update',
            'as' => 'reactor.travelpackage.edit',
        ]);
    });
});


