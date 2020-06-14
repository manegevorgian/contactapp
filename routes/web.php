<?php

use Illuminate\Support\Facades\Route;



Route::get('/', "ContactController@index") -> name("contacts.index") -> middleware('auth');

Route::post('/', "ContactController@store") -> name("contacts.store");

Route::get('/contacts/create', "ContactController@create") -> name("contacts.create") -> middleware('auth');

Route::get('/contacts/{id}', "ContactController@show") -> name("contacts.show");

Route::get('/contacts/{id}/edit', "ContactController@edit") -> name("contacts.edit");

Route::put('/contacts/{id}', "ContactController@update") -> name("contacts.update");

Route::delete('/contacts/{id}', "ContactController@destroy") -> name("contacts.destroy");




// Admin Panel


Route::get('/profile', function(){
    return view('contacts.profile');
}) -> name('admin.profile');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
