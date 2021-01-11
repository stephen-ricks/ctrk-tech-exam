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

$app->group(['prefix' => 'employees'], function () use ($app) {
    $app->get('/',  "EmployeeController@getAll");
    $app->get('/{id}',  "EmployeeController@findById");
    $app->post('/',  "EmployeeController@create");
    $app->post('/{id}',  "EmployeeController@update");
    $app->delete('/{id}',  "EmployeeController@delete");
});