<?php
Route::group(['prefix' => '/admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => ['admin', 'auth']], function () {

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/contacts', 'ContactController@index')->name('contacts');
    Route::put('contacts/update/{id}', 'ContactController@update')->name('contacts.update');
    Route::get('/queries', 'QueryController@index')->name('queries.index');
    Route::get('/queries/show/{id}', 'QueryController@show')->name('queries.show');
    Route::delete('/queries/destroy/{id}', 'QueryController@destroy')->name('queries.destroy');
    Route::post('/tricks/photo', 'TrickController@photo')->name('delete.tricks.photo');

    Route::resources([

        'users' => 'UserController',
        'faqs'  => 'FaqController',
        'pages' => 'PageController',
        'tricks' => 'TrickController',
    ]);

});