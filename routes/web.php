<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

// Localization
Route::get('/js/lang.js', function () {
//    $strings = Cache::rememberForever('lang.js', function () {
        $lang = config('app.locale');

        $files   = glob(resource_path('lang/' . $lang . '/*.php'));
        $strings = [];

        foreach ($files as $file) {
            $name           = basename($file, '.php');
            $strings[$name] = require $file;
        }

//        return $strings;
//    });

    header('Content-Type: text/javascript');
    echo('window.i18n = ' . json_encode($strings) . ';');
    exit();
})->name('assets.lang');

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

Route::get('/business/single', function () {
    return view('business-single');
})->middleware('auth');

Route::get('/register/seller ', function () {
    return view('auth.register.seller');
});
Route::get('/register/buyer', function () {
    return view('auth.register.buyer');
});

Route::get('/services', 'ServiceController@index')->middleware('auth');

Route::get('/news', function () {
    return view('news');
})->middleware('auth');

Route::get('/news-single', function () {
    return view('news-single');
})->middleware('auth');

Route::get('/ui', function () {
    return view('ui');
})->middleware('auth');

Route::get('services/list', 'ServiceController@list');

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
Route::get('/broker/{vue_capture?}', function () {
    return view('brpa.broker');
});


Route::get('/about', function () {
    return view('about');
});

//region BUSINESS Routes
Route::namespace('Business')->group(function () {
    Route::resource('business', 'BusinessController')->middleware('auth');

});
//endregion

//region API Routes
Route::namespace('Api')->group(function () {
    Route::get('/location-get-countries', 'LocationController@getCountries')->middleware('auth');
    Route::get('/location-get-cities', 'LocationController@getCities')->middleware('auth');

    Route::get('/business-get', 'BusinessController@get')->middleware('auth');
    Route::get('/business-get-categories', 'BusinessController@getCategories')->middleware('auth');
    Route::post('/business-image-upload', 'BusinessController@imageUpload')->middleware('auth');
});
//endregion

/**
 * Личный кабинет
 * */
Route::group(['prefix' => 'profile',  'middleware' => 'auth'], function(){
    Route::get('', 'ProfileController@index');
    Route::post('avatar', 'ProfileController@uploadAvatar');
    Route::post('update', 'ProfileController@update');
    Route::get('cities', 'ProfileController@getCities');
    Route::post('password', 'ProfileController@updatePassword');

    Route::get('favorite', 'ProfileController@getFavorites');
    Route::post('favorites/business/{object}', 'ProfileController@addBusinessToFavorites');
    Route::post('favorites/franchise/{object}', 'ProfileController@addFranchiseToFavorites');

    Route::get('purchased_services', 'ProfileController@getPurchasedServices');

    Route::get('balance/transactions', 'ProfileController@getPaymentTransactions');

    Route::get('view_requests', 'ProfileController@getViewRequests');
    Route::patch('view_request/{view_request}/{status}', 'ProfileController@setViewRequestStatus');

    Route::get('/api/objects', 'ProfileController@getObjects');

    Route::patch('/api/object/{type}/{id}/status/{status}', 'ProfileController@setObjectStatus');
});

/* Фикс для возможных конфликтов роутор даравела и личного кабинета */
Route::get('/profile/{vue_capture?}', 'ProfileController@index')->where('profile', '[\/\w\.-]*')->middleware('auth');
