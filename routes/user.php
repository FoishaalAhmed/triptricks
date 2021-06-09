<?php
Route::group(['prefix' => '/user', 'namespace' => 'User', 'as' => 'user.', 'middleware' => ['user', 'auth']], function () {

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');;

});