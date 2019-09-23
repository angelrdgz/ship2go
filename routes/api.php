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

Route::group(['middleware' => ['json.response']], function () {

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::prefix('auth')->group(function () {

        Route::post('/login', 'Api\AuthController@login')->name('login.api');
        Route::post('/register', 'Api\AuthController@register')->name('register.api');

        // private routes
        Route::middleware('auth:api')->group(function () {
            Route::get('/logout', 'Api\AuthController@logout')->name('logout');
        });
    });

    // public routes


});

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        // Matches The "/admin/users" URL
    });
});

Route::prefix('auth')->group(function (){
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::get('profile', 'AuthController@getUser');
    Route::get('active-account/{hash}', 'AuthController@activeAccount');
    Route::post('forgot-password', 'AuthController@forgotPassword');
    Route::post('restore-password', 'AuthController@restorePassword');
});*/
