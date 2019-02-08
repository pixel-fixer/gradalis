<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'chat',  'middleware' => 'auth'], function(){
    Route::get('', 'ChatController@index');
    Route::post('dialog', 'ChatController@newDialog');
    Route::get('dialogs', 'ChatController@getDialogs');
    Route::get('dialog/{dialog}', 'ChatController@getDialog');
    Route::get('dialog/{dialog}/messages', 'ChatController@getMessages');
    Route::post('message', 'ChatController@newMessage');
    Route::delete('message/{message}', 'ChatController@deleteMessage');
    Route::patch('message/{message}/accept', 'ChatController@acceptMessage');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/business', function () {
    return view('business');
})->middleware('auth');

Route::get('/business/single', function () {
    return view('business-single');
})->middleware('auth');

Route::get('/register/seller ', function () {
    return view('auth.register.seller');
});
Route::get('/register/buyer ', function () {
    return view('auth.register.buyer');
});

Route::get('/services', function () {
    return view('services');
})->middleware('auth');

Route::get('/news', function () {
    return view('news');
})->middleware('auth');
Route::get('/news-single', function () {
    return view('news-single');
})->middleware('auth');

Route::get('/ui', function () {
    return view('ui');
})->middleware('auth');

Route::group(['prefix' => 'profile',  'middleware' => 'auth'], function(){
    Route::get('', 'ProfileController@index');
    Route::post('avatar', 'ProfileController@uploadAvatar');
    Route::post('update', 'ProfileController@update');
    Route::get('cities', 'ProfileController@getCities');
    Route::post('password', 'ProfileController@updatePassword');
});


Route::get('/spa/favorites', function () {
    return view('spa.favorites');
});
Route::get('/spa/legal', function () {
    return view('spa.legal');
});
Route::get('/spa/services', function () {
    return view('spa.services');
});
Route::get('/spa/settings', function () {
    return view('spa.settings');
});
Route::get('/spa/balance', function () {
    return view('spa.balance');
});
Route::get('/spa/purchased-services', function () {
    return view('spa.purchased-services');
});
Route::get('/spa/objects', function () {
    return view('spa.objects');
});
Route::get('/spa/view-request', function () {
    return view('spa.view-request');
});

Route::get('/add-business', function () {
    return view('add-business');
});
Route::get('/add-business/method', function () {
    return view('add-business-method');
});

Route::get('/brpa/offers/instructions', function () {
    return view('brpa.offers.instructions');
});
Route::get('/brpa/offers/conditions', function () {
    return view('brpa.offers.conditions');
});
Route::get('/brpa/offers/payments', function () {
    return view('brpa.offers.payments');
});
Route::get('/brpa/offers/instruments', function () {
    return view('brpa.offers.instruments');
});
Route::get('/brpa/offers/details', function () {
    return view('brpa.offers.details');
});

Route::get('/get-businesses', 'Api\BusinessController@getBusinesses')->middleware('auth');
Route::get('/get-businesses-categories', 'Api\BusinessController@getBusinessesCategories')->middleware('auth');
