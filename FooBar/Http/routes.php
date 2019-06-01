<?php

Route::group(['middleware' => 'web', 'prefix' => 'foobar', 'namespace' => 'Modules\FooBar\Http\Controllers'], function()
{
    Route::get('/', 'FooBarController@index');
});
