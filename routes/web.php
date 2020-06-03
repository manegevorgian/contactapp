<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'ContactController@index')->name('contacts.index');

Route::post('/', "ContactController@store")->name("contacts.store");

Route::get('/create', 'ContactController@create')->name('contacts.create');

Route::get('/{id}', 'ContactController@show')->name('contacts.show');

Route::get('/edit/{id}', 'ContactController@edit')->name('contacts.edit');

Route::get('/drop/{id}', 'ContactController@drop')->name('contacts.drop');



// Admin Panel
Route::get('/contacts/settings', function (){
    return view('contacts.profile');
})->name('contacts.profile');


