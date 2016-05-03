<?php

Route::post('saveContact', function() {
    return response()->json(['sucess' => 'Kontakt erfolgreich gespeichert'], 201);
});

Route::get('getContacts', function() {
    return App\User::with('usertype', 'billingaddress')->get();
});

Route::get('lang', function() {
   return App\TranslationLanguage::where('translations_category_id', 1)->get();
});

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('layouts.app');
    });

});