<?php

Route::post('saveContact', function() {
    return response()->json(['sucess' => 'Kontakt erfolgreich gespeichert'], 201);
});

Route::get('getContacts', function() {
    return App\User::all();
});

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('layouts.app');
    });

});