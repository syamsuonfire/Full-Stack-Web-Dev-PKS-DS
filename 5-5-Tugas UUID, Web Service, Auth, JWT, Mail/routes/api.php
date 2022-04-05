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

Route::apiResource('roles','RoleController');
Route::apiResource('posts','PostController');
Route::apiResource('comments','CommentController');

Route::group(['prefix'=> 'auth', 'namespace'=>'auth'], function() {
Route::post('/register','RegisterController')->name('auth.register');
Route::post('/regenerate-otp-code','RegenerateOtpCodeController')->name('auth.regenerate');
Route::post('/verification','VerificationController')->name('auth.verification');
Route::post('/update-password','UpdatePasswordController')->name('auth.update_password');
Route::post('/login','LoginController')->name('auth.login');
});


