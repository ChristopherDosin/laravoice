<?php

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('layouts.app');
    });

    Route::group(['middleware' => ['web'], 'as' => 'api.', 'prefix' => 'api', 'namespace' => 'Api'], function () {

        //Route::get('getContacts', [
        //    'as' => 'getContacts', 'uses' => 'ContactController@getContacts'
        // ]);

        Route::get('getContacts', function() {
            return App\Contact::with('billing', 'type')->get();
        });

        Route::get('getContactTypes', function() {
            return App\ContactType::all();
        });

        Route::post('saveContact', [
            'as' => 'saveContact', 'uses' => 'ContactController@saveContact'
        ]);

    });

});