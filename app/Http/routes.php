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

    Route::post('/register', function () {
        $number = '5015231958'; # Number with country code
        $type = 'sms'; # This can be either sms or voice

        $response = WhatsapiTool::requestCode($number, $type);

        return response()->json(compact('response'));
    });

});


