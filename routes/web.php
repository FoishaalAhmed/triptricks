<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    /** profile route start **/
    Route::view('/profile', 'backend/profile');
    Route::post('/profile', 'ProfileController@photo')->name('profile');
    Route::post('/password', 'ProfileController@password')->name('password.change');
    Route::post('/profile-update', 'ProfileController@update')->name('profile.update');
    /** profile route end **/
});

Route::group(['namespace' => 'Frontend'], function () {

    Route::get('/', 'HomeController@index');
    Route::get('/about', 'HomeController@about')->name('about');
    Route::get('/tricks', 'TrickController@index')->name('tricks');
    Route::get('/tricks/{id}/{title}', 'TrickController@trick')->name('tricks.detail');
    Route::get('/contacts', 'ContactController@index')->name('contacts');
    Route::post('/query', 'ContactController@query')->name('query');
    Route::get('/{slug}', 'ContactController@page')->name('page');

});
