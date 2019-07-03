<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
 */
/**
 * Application API Route
 */
Route::group(['middleware' => 'api', 'namespace' => 'Extension\Site\Http'], function () {

    //Route::get('page/{slug}', 'ApiController@getPage');
    //Route::post('payment', 'PaymentController@checkout');
});

Route::group(['namespace' => 'ReactorCMS\Http\Controllers'], function () {

    Route::post('logout', 'Auth\LoginController@loggedOut');
    Route::get('auth/user', 'Auth\LoginController@getUser');

    Route::patch('settings/profile', 'Settings\ProfileController@update');
    Route::put('settings/password', 'Settings\PasswordController@update');
});

Route::group(['middleware' => 'api', 'namespace' => 'ReactorCMS\Http\Controllers'], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');
    Route::get('register/verify/{email}', 'Auth\RegisterController@verify');

    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/forgot', 'Auth\ResetPasswordController@forgot');
    Route::post('password/reset/{email}', 'Auth\ResetPasswordController@reset');

    Route::post('oauth/{provider}', 'Auth\OAuthController@redirectToProvider');
    //Route::post('oauth/{provider}', 'Auth\OAuthController@redirect');
    Route::get('oauth/{provider}/callback', 'Auth\OAuthController@handleProviderCallback')->name('oauth.callback');
    Route::get('oauth/authorised/{params}', 'Auth\OAuthController@ProviderAuthorisation');
    //Route::get('oauth/{provider}/callback', 'Auth\OAuthController@callback')->name('oauth.callback');
});
/**
 * Payment Gateway
 */
Route::group(['middleware' => 'api', 'namespace' => 'Extension\Site\Http'], function () {

    Route::post('checkout', 'PaymentController@AuthPayment');
    Route::get('checkout/{provider}', 'PaymentController@checkout');
    Route::get('checkout/authorised/{provider}', 'PaymentController@handleProviderCallback');
    
});



/**
 * Application Route
 */
Route::group(['middleware' => ['api','track'], 'namespace' => 'Extension\Site\Http'], function () {

    Route::get('/', function (Request $request) {
        die("Welcome, REST API");
    });
    
    //Pages
    Route::get('pages','ApiController@getPages');
    Route::get('page/{slug}','ApiController@getPage');

    //Blogs

    Route::get('blogs','ApiController@getBlogs');
    Route::get('blog/{slug}','ApiController@getBlog');

    Route::get('packages','ApiController@getPackages');
    
    // Contact
    Route::post('contact','ApiController@contact');

    //Settings
    Route::get('settings','ApiController@getSettings');

    //Room type
    Route::get('roomtypes','RoomTypeController@getRoomtype');
    Route::get('room/{slug}','RoomTypeController@index');
    Route::post('checkavailibulity','RoomTypeController@checkAvailibility');


    //Route::post('checkout','RoomTypeController@checkOut');

    Route::post('checkout/{provider}', 'PaymentController@handleProviderCallback');
    Route::get('checkout/redirect/{provider}', 'PaymentController@handleProviderRedirect')->name('checkout.redirect');
    Route::get('checkout/transaction/{txn}', 'PaymentController@getTransaction')->name('checkout.transaction');
});
