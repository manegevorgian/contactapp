<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'ContactController@index')->name('contacts.index');

Route::get('/contacts/create', 'ContactController@create')->name('contacts.create');

Route::get('/contacts/{id}', 'ContactController@show')->name('contacts.show');

Route::get('/contacts/edit/{id}', 'ContactController@edit')->name('contacts.edit');

Route::post('/contacts', "ContactController@store")->name("contacts.store");


// Admin Panel
Route::get('/contacts/settings', function (){
    return view('contacts.profile');
})->name('contacts.profile');

