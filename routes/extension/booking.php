<?php
/**
 * Created by PhpStorm.
 * User: rahul
 * Date: 1/1/19
 * Time: 5:51 PM
 */

/*Admin USE*/
Route::group([
    'prefix' => '/',
    'middleware' => ['setTheme:' . config('themes.active_reactor'), 'web'],

], function () {

    Route::group([
        'middleware' => ['auth:admin'],

    ], function () {


        Route::get('/bookings', [
            'uses' => '\Extension\Site\Http\Backend\BookingController@booking',
            'as' => 'reactor.booking.index',
        ]);

        Route::get('/transactions', [
            'uses' => '\Extension\Site\Http\Backend\BookingController@transaction',
            'as' => 'reactor.transaction.index',
        ]);

        Route::get('/transaction/view/{id}', [
            'uses' => '\Extension\Site\Http\Backend\BookingController@view',
            'as' => 'reactor.transaction.view',
        ]);

        Route::get('/booking/view/{id}', [
            'uses' => '\Extension\Site\Http\Backend\BookingController@bookingView',
            'as' => 'reactor.booking.view',
        ]);

        Route::post('/booking/search', [
            'uses' => '\Extension\Site\Http\Backend\BookingController@search',
            'as' => 'reactor.booking.search',
        ]);
    });
});


