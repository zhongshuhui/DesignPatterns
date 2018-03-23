<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/design', 'Design\TestController@index');
Route::get('/design/simpleFactory', 'Design\TestController@simpleFactory');
Route::get('/design/staticFactory', 'Design\TestController@staticFactory');
Route::get('/design/singleton', 'Design\TestController@singleton');
Route::get('/design/adapter', 'Design\TestController@adapter');
Route::get('/design/dependencyInjection', 'Design\TestController@dependencyInjection');
Route::get('/design/proxy', 'Design\TestController@proxy');


