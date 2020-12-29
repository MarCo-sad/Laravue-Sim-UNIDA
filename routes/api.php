<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'cooperations'],function($router){
    Route::get('/', 'CooperationsController@index');
    Route::post('/store', 'CooperationsController@store');
    Route::get('/{id?}', 'CooperationsController@show');
    Route::post('/update/{id?}', 'CooperationsController@update');
    Route::delete('/{id?}', 'CooperationsController@destroy');
});

Route::group(['prefix'=>'activities'],function($router){
    Route::get('/', 'ActivitiesController@index');
    Route::post('/store', 'ActivitiesController@store');
    Route::get('/{id?}', 'ActivitiesController@show');
    Route::post('/update/{id?}', 'ActivitiesController@update');
    Route::delete('/{id?}', 'ActivitiesController@destroy');
});

Route::group(['prefix' => 'lembaga'],function($router){
    Route::get('/', 'LembagaController@index');
    Route::get('/fetch/{id}', 'LembagaController@fetchOne');
   
});
Route::group(['prefix' => 'jeniskerjasama'],function($router){
    Route::get('/', 'JenisKerjasamaController@index');
    Route::get('/fetch/{id}', 'JenisKerjasamaController@fetchOne');
   
});
Route::group(['prefix' => 'benua'],function($router){
    Route::get('/', 'BenuaController@index');
    Route::get('/fetch/{id}', 'BenuaController@fetchOne');
   
});
Route::group(['prefix' => 'country'],function($router){
    Route::get('/', 'CountryController@index');
    Route::get('/fetch/{id}', 'CountryController@fetchOne');
   
});
Route::group(['prefix' => 'city'],function($router){
    Route::get('/', 'CityController@index');
    Route::get('/fetch/{id}', 'CityController@fetchOne');
   
});
Route::group(['prefix' => 'bidang'],function($router){
    Route::get('/', 'BidangController@index');
    Route::get('/fetch/{id}', 'BidangController@fetchOne');
   
});