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


$app->get('/', function () use ($app) {
    return view('index');
});


$app->get('/migration', function () use ($app) {
    return view('components.migration');
});

$app->get('/migration/controll/{id}','LMTMigrationController@edit');
$app->post('/migration/save/{id}','LMTMigrationController@renderTableBody');



$app->post('/migration','LMTMigrationController@save');

