<?php

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

Route::group([
    'namespace' => 'Api',
    'prefix' => 'v1'
], function ($router) {
    Route::post('login', 'AuthController@auth');

    Route::group([
        // 'middleware' => ['api', 'jwt.auth'],
        'middleware' => ['api']
    ], function ($router) {

        /*
        |--------------------------------------------------------------------------
        | Routes about Authentication
        |--------------------------------------------------------------------------
        */
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');

        /*
        |--------------------------------------------------------------------------
        | Routes about users
        |--------------------------------------------------------------------------
        */
        Route::post('users/image/update/{id}', 'UserController@updateImage');

        Route::post('dashboard', 'DashboardController@dashboard');

        Route::resource('users', 'UserController');

        Route::get('get-profile', 'UserController@getProfile');
        Route::post('save-profile', 'UserController@saveProfile');
        Route::post('user-reset-password', 'UserController@resetPassword');      
        
        Route::post('forgotPassword', 'AuthController@forgotPassword');

        Route::post('user/recovery', 'UserRecoveryController@recovery')->name('user.password.recoveryUser')->middleware(['web']);
        Route::get('user/recovery/{token}', 'UserRecoveryController@recoveryForm')->name('user.password.recoveryUser.form')->middleware(['web']);
        Route::post('user/recovery/{token}', 'UserRecoveryController@change')->middleware(['web']);
  
        /*
        |--------------------------------------------------------------------------
        | Desafios Routes
        |--------------------------------------------------------------------------
        */
        Route::resource('desafios', 'DesafiosController');
        Route::post('primeiro', 'DesafiosController@primeiro');
        Route::post('segundo', 'DesafiosController@segundo');
        Route::post('terceiro', 'DesafiosController@terceiro');
        Route::post('quarto', 'DesafiosController@quarto');
        Route::post('quinto', 'DesafiosController@quinto');
        Route::post('sexto', 'DesafiosController@sexto');
        Route::post('setimo', 'DesafiosController@setimo');
        Route::post('oitavo', 'DesafiosController@oitavo');
        Route::post('nono', 'DesafiosController@nono');
    });
});
