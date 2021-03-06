<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth') -> group(function() {
    Route::get('/contacts', "ContactController@index")->name("contacts.index");

    Route::post('/contacts', "ContactController@store")->name("contacts.store");

    Route::get('/contacts/create', "ContactController@create")->name("contacts.create");

    Route::get('/contacts/{id}', "ContactController@show")->name("contacts.show");

    Route::put('/contacts/{id}', "ContactController@update")->name("contacts.update");

    Route::delete('/contacts/{id}', "ContactController@destroy")->name("contacts.destroy");

    Route::get('/contacts/{id}/edit', "ContactController@edit")->name("contacts.edit");
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

// Admin Panel
Route::get('/profile', function(){
    return view('contacts.profile');
}) -> name('admin.profile');
