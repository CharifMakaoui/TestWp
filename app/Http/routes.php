<?php

Route::group(['prefix' => '/','middleware' => ['web']], function () {

    Route::get('/',function (){
        return response()->view('welcome');
    });

    Route::get('/php',function (){
        phpinfo();
    });

    Route::auth();

    Route::get('me/accounts', ['as' => 'allMyWhatsAppAccounts' , 'uses' => 'web\whatsAccounts_controller@index']);

    Route::get('me/accounts/new', ['as' => 'newAccountWhatsApp', 'uses' => 'web\whatsAccounts_controller@send_to_get_validation_view']);
    Route::post('me/accounts/new', ['as' => 'newWhatsAppAccount', 'uses' => 'web\whatsAccounts_controller@send_to_get_validation']);

    Route::get('me/accounts/activate/{number}', ['as' => 'validateWhatsAppAccount_view', 'uses' => 'web\whatsAccounts_controller@send_validate_account_view']);
    Route::post('me/accounts/activate/{number}', ['as' => 'validateWhatsAppAccount', 'uses' => 'web\whatsAccounts_controller@send_validate_account']);


    Route::get('/me/clients', ['as' => 'myClients_list', 'uses' => 'web\client_controller@index']);

    Route::get('/me/clients/new', ['as' => 'auth_new_client_view', 'uses' => 'web\client_controller@add_client_view_auth']);

    Route::get('/{user}/clients/new', ['as' => 'simple_new_client_view', 'uses' => 'web\client_controller@add_client_view']);
    Route::post('/{user}/clients/new', ['as' => 'add_new_client', 'uses' => 'web\client_controller@add_client']);


    Route::get('/verefier/{user}/{number}', ['as' => 'verefier_number', 'uses' => 'web\client_controller@verifier_whats_app_number']);


    Route::get('/category', ['as' => 'list_categories', 'uses' => 'web\category_controller@index']);
    Route::get('/category/new', ['as' => 'new_category', 'uses' => 'web\category_controller@add_category_view']);
    Route::post('/category/new', ['as' => 'post_new_category', 'uses' => 'web\category_controller@add_category']);

});

Route::group(['prefix' => 'api','middleware' => ['api']], function () {

    Route::post('register', 'WhatsApi@register');
    Route::post('verification', 'WhatsApi@verification');
});

