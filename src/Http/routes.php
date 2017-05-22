<?php

Route::group(['middleware' => 'web', 'prefix' => 'appfoundation', 'namespace' => 'App\\Components\AppFoundation\Http\Controllers'], function()
{
    Route::get('/', 'AppFoundationController@index');
});
