<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => ['api'],
], function () {

    Route::get('customers', [
        'as'         => 'api.customers',
        'uses'       => '\App\Http\Controllers\CustomersController@listAction'
    ]);

    Route::get('search', [
        'as'         => 'api.customers.search',
        'uses'       => '\App\Http\Controllers\CustomersController@searchAction'
    ]);
});
