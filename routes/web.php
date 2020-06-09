<?php

use Illuminate\Support\Facades\Route;



Route::get('/', "ContactController@index") -> name("contacts.index");

Route::post('/', "ContactController@store") -> name("contacts.store");

Route::get('/contacts/create', "ContactController@create") -> name("contacts.create");

Route::get('/contacts/{id}', "ContactController@show") -> name("contacts.show");

Route::put('/contacts/{id}', "ContactController@update") -> name("contacts.update");

Route::delete('/contacts/{id}', "ContactController@destroy") -> name("contacts.destroy");

Route::get('/contacts/{id}/edit', "ContactController@edit") -> name("contacts.edit");



// Admin Panel



Auth::routes();
Route::get('/login', function ()
{
    return view('auth.login');
})->name('login');

Route::get('/register', function ()
{
    return view('auth.register');
})->name('register');

Route::get('/logout', 'AdminController@logout')->name('logout');

Route::post('/logout', 'AdminController@logout')->name('logout');



Route::group(['middleware' => ['auth'],'prefix' => 'admin'], function()
{
    Route::get('/', 'AdminController@index')->name('home');

    Route::get('/profile', 'AdminController@profile') -> name('admin.profile');

});
