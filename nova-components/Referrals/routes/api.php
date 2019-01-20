<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/
Route::get('/data', 'Marketplace\Referrals\Http\Controllers\HomeController@index');
Route::get('/statistics', 'Marketplace\Referrals\Http\Controllers\HomeController@statistics');
Route::get('/get-sellers-buyers', 'Marketplace\Referrals\Http\Controllers\HomeController@getSellersBuyers');
Route::get('/get-campaigns', 'Marketplace\Referrals\Http\Controllers\HomeController@getCampaigns');
Route::get('/get-types', 'Marketplace\Referrals\Http\Controllers\HomeController@getTypes');

// Route::get('/endpoint', function (Request $request) {
//     //
// });
