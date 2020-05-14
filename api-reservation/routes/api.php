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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
    Route::apiResource('lieus', 'LieuController');
});*/

Route::middleware('api')->prefix('auth')->namespace('Auth')->group(function() {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::middleware('auth:api')->group(function() {
    Route::apiResource('evenements', 'EvenementController');
    Route::get('evenements/{evenement}/add', 'EvenementController@addParticipant')->name('evenements.addParticipant');
    Route::get('evenements/{evenement}/delete', 'EvenementController@deleteParticipant')->name('evenements.deleteParticipant');
    Route::apiResource('lieus', 'LieuController');
});
