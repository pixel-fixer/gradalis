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
Route::get('/index', 'Marketplace\Business\Http\Controllers\HomeController@index');
Route::get('/get/{business}', 'Marketplace\Business\Http\Controllers\HomeController@get');
Route::put('/update/{business}', 'Marketplace\Business\Http\Controllers\HomeController@update');
Route::post('/create/{business}', 'Marketplace\Business\Http\Controllers\HomeController@create');
