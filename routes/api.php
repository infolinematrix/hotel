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
    Route::get('page/{slug}','ApiController@getPage');

    //--Has Business
    Route::get('auth/business','BusinessController@hasBusiness');

    //Business Profile
    Route::get('profile/{slug}','BusinessController@getProfile');

    Route::post('profile/post-contact/{id}','BusinessController@postContact');
    Route::post('profile/post-appointment/{id}','BusinessController@postAppointment');

    Route::get('add-business','BusinessController@addBusiness');
    Route::post('post-business','BusinessController@postBusiness');
    Route::get('business/{id}/edit/{source_id}','BusinessController@editBusiness');
    Route::post('business/{id}/update/{source_id}','BusinessController@updateBusiness');

    Route::post('business/upload/image/{id}','BusinessController@uploadImage');

    Route::post('business/{id}/working-hours/{source_id}','BusinessController@UpdateHours');

    //Business list//
    Route::get('business/list/new/{limit?}','BusinessController@list_New');
    Route::get('business/list/visit/{limit?}','BusinessController@list_Visit');
    Route::get('business/list/sponsored/{limit?}','BusinessController@getSponsored');

    Route::get('categories','BusinessController@getCategories');
    Route::get('locations','BusinessController@getLocations');

    Route::get('search/location/{any}','BusinessController@searchLocation');
    Route::get('search/keyword/{any}','BusinessController@searchKeyword');
    Route::post('search/business','BusinessController@postSearch');
    Route::get('search/{params?}','BusinessController@search');

    Route::get('keywords','BusinessController@getKeywords');

    

    //--Generate Node Form
    Route::get('create-form/{slug}','ProductController@getFormFields');

    //--Reviews
    Route::get('reviews','BusinessController@reviews');
    Route::get('reviews/{node_id}','ReviewController@reviews');
    Route::post('review/submit','ReviewController@store');
    //--End of Reviews

    Route::get('products/{id}','ProductController@index');
    Route::get('product/{id}/edit/{source}','ProductController@editProduct');
    Route::post('product/{id}/edit/{source}','ProductController@updateProduct');
    Route::post('delete/photo/{id}','ProductController@deletePhoto');


    Route::post('product/add/{id}','ProductController@postProduct');
    

    //--Banner
    Route::get('banners/{homepage}/{limit}','ApiController@getBanner');

    //--Popular tags
    Route::get('tags/popular','TagsController@getPopularTags');

    //Payment
    Route::post('payment', 'PaymentController@checkout');
   
    //--Browse
    Route::get('tag/{all?}','TagsController@getTag')->where(['all' => '.*']);
    Route::get('browse/{all?}', 'BusinessController@browse')->where(['all' => '.*']);


});
