<?php

use Illuminate\Http\Request;

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
Route::post('/searchitem','ResturantController@searchitem');
Route::get('/gettablesfour','ResturantController@gettablesfour');
Route::get('/gettablessix','ResturantController@gettablessix');
Route::post('/addorderres','ResturantController@addorderres');
Route::get('/getitems','ResturantController@getitems');
Route::get('/getpirce/{id}','ResturantController@getpriceofitem');
Route::get('/getitemdet/{id}','ResturantController@getdetailsidwise');
Route::post('/additemtoorder/{id}','ResturantController@additemtoorder');
Route::get('/getorders','ResturantController@getallorders');
Route::get('/getorderdetails/{id}','ResturantController@getperticularorder');
Route::get('/tableno/{id}','ResturantController@getTableNumber');