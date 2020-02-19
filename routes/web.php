<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('backend.auth.connexion');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/liste-ticket','ListeTicketController@index')->name('liste-ticket.index');
Route::get('/liste-ticket/{liste}/voir','ListeTicketController@show')->name('liste-ticket.show');
Route::get('/liste-ticket/{liste}/valider','ListeTicketController@valider')->name('liste-ticket.valider');

Route::get('/utilisateur','UserController@index')->name('user.index');
Route::post('/utilisateur','UserController@store')->name('user.store');
Route::post('/utilisateur/change-password','UserController@changePassword')->name('user.changePassword');
Route::put('/utilisateur/{user}','UserController@update')->name('user.update');
Route::delete('/utilisateur/{user}','UserController@destroy')->name('user.delete');


Route::get('/service','ServiceController@index')->name('service.index');
Route::post('/service','ServiceController@store')->name('service.store');
Route::put('/service/{service}','ServiceController@update')->name('service.update');
Route::delete('/service/{service}','ServiceController@destroy')->name('service.delete');
