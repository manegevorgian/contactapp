<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'ContactController@index')->name('contacts.index');

Route::get('/contacts/create', 'ContactController@create')->name('contacts.create');

Route::get('/contacts/show/{id}', 'ContactController@show')->name('contacts.show');

Route::get('/contacts/edit/{id}', 'ContactController@edit')->name('contacts.edit');




// Admin Panel
Route::get('/contacts/settings', function (){
    return view('contacts.profile');
})->name('contacts.profile');

