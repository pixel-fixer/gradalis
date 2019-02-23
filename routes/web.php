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

Auth::routes(['verify' => true]);

Route::domain('ref.'.config('app.domain'))->group(function () {
    Route::get('invitation/{token}','InvitationController@invitation');
});

// JS Localization
Route::get('/js/lang.js','CoreController@lang')->name('assets.lang');

//User data for vuex
Route::get('/js/user.js','CoreController@user')->name('assets.user');

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
Route::get('/services', 'ServiceController@index')->middleware('auth');

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

//region Static
Route::get('/about', function () {
    return view('about');
});
Route::get('/vacancy', function () {
    return view('vacancy.index');
});
Route::get('/vacancy/single', function () {
    return view('vacancy.show');
});
Route::get('/contacts', function () {
    return view('contacts');
});
Route::get('/reviews', function () {
    return view('reviews');
});
Route::get('/help', function () {
    return view('help');
});
//endregion

//region Services
Route::get('/services-new', function () {
    return view('services.index');
});
Route::get('/services-new/category', function () {
    return view('services.category');
});
Route::get('/services-new/single', function () {
    return view('services.single.main');
});
Route::get('/services-new/single/process', function () {
    return view('services.single.process');
});
Route::get('/services-new/single/team', function () {
    return view('services.single.team');
});
Route::get('/services-new/single/details', function () {
    return view('services.single.details');
});
Route::get('/services-new/single/cases', function () {
    return view('services.single.cases');
});
//endregion

//region ACCOUNT Routes
Route::middleware(['role:Акаунт-менеджер'])->namespace('Account')->prefix('account')->group(function () {
    Route::get('/{vue_capture?}', 'AccountController@index')->where('vue_capture', '.*')->middleware('auth');;
});
//endregion

//region BUSINESS Routes
Route::namespace('Business')->group(function () {
    Route::resource('business', 'BusinessController');
});
//endregion


//region BROKER Routes
Route::namespace('Broker')->prefix('broker')->group(function () {
    Route::get('/{vue_capture?}', 'BrokerController@index')->where('vue_capture', '.*')->middleware('auth');;
});
//endregion

//region API Routes
Route::namespace('Api')
    //->middleware('auth')
    ->group(function () {
    //Route::middleware(['role:Акаунт-менеджер'])->group(function(){
        Route::post('/account-get-partners', 'AccountController@getPartners');
        Route::post('/account-chart-data', 'AccountController@getChartData');
    //});

    Route::get('/location-get-countries', 'LocationController@getCountries');
    Route::get('/location-get-cities', 'LocationController@getCities');
    Route::get('/location-get-regions', 'LocationController@grtRegions');

    Route::post('/business-image-upload', 'BusinessController@imageUpload');

    //Route::middleware(['role:Медиа-баер'])->group(function() {
        Route::post('/offer-bookmark', 'OfferController@bookmark');
        Route::post('/offer-all', 'OfferController@index');
        Route::get('/offer-get/{id}', 'OfferController@get');
        Route::post('/invitation-create', 'OfferController@invitationCreate');
    //});

    Route::get('/business-get', 'BusinessController@get');
    Route::get('/business-get-by-id/{business}', 'BusinessController@getById');
    Route::get('/business-get-categories', 'BusinessController@getCategories');
    Route::post('/business-image-upload', 'BusinessController@imageUpload');
    Route::post('/business-image-remove', 'BusinessController@imageRemove');
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
    Route::post('favorites/business/{object}', 'ProfileController@toggleFavoriteBusiness');
    Route::post('favorites/franchise/{object}', 'ProfileController@toggleFavoriteFranchise');

    Route::get('purchased_services', 'ProfileController@getPurchasedServices');
    Route::get('/api/purchased_service/{service}', 'ProfileController@getPurchasedService')->middleware('BelongsToAuthUser:service');

    Route::get('balance/transactions', 'ProfileController@getPaymentTransactions');

    Route::get('view_requests', 'ProfileController@getViewRequests');
    Route::patch('view_request/{view_request}/{status}', 'ProfileController@setViewRequestStatus');

    Route::get('/api/objects', 'ProfileController@getObjects');

    Route::patch('/api/object/{type}/{id}/status/{status}', 'ProfileController@setObjectStatus');

    Route::get('/api/trips', 'ProfileController@getTrips');
});

/* Фикс для возможных конфликтов роутов ларавела и личного кабинета */
Route::get('/profile/{vue_capture?}', 'ProfileController@index')->where('vue_capture', '[\/\w\.-]*')->middleware('auth');
