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
    Route::get('dialogs', 'ChatController@getDialogs');
    Route::get('dialog/{dialog}', 'ChatController@getMessages');
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
Route::get('/register/buyer', function () {
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

Route::get('/spa/favorites', function () {
    return view('spa.favorites');
});
Route::get('/spa/legal', function () {
    return view('spa.legal');
});
