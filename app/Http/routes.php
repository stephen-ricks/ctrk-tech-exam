<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


use Illuminate\Http\Response as HttpResponse;

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->group(['prefix' => 'employees'], function () use ($app) {
    $app->get('/',  "EmployeeController@getAll");
    $app->get('/{id}',  "EmployeeController@findById");
    $app->post('/',  "EmployeeController@create");
    $app->post('/{id}',  "EmployeeController@update");
    $app->delete('/{id}',  "EmployeeController@delete");
});