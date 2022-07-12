<?php

Route::group([
    'prefix' => 'api/users',
], static function () {
    Route::get('/', 'UserController@list');
    Route::post('/', 'UserController@store');
    Route::patch('/{id}', 'UserController@update');
    Route::delete('/{id}', 'UserController@delete');
});
