<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'api'],function (){

    Route::get('/',function (){
        return response()->view('welcome');
    });

    Route::get('/register', [
        'as' => 'register_number',
        'uses' => 'WhatsApi@register'
    ]);

});


