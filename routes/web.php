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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/reportar','HomeController@getReport');
Route::post('/reportar','HomeController@postReport');


//Asociar un grupo de rutas a un middleware
Route::group(['middleware'=>'admin','namespace'=>'Admin'],function(){

	//User
	Route::get('/usuarios','UserController@index');
	Route::post('/usuarios','UserController@store');

	Route::get('/usuario/{id}','UserController@edit');
	Route::post('/usuario/{id}','UserController@update');

	Route::get('/usuario/{id}/eliminar','UserController@delete');

	//Projec
	Route::get('/proyectos','ProjectController@index');
	Route::post('/proyectos','ProjectController@store');

	Route::get('/proyecto/{id}','ProjectController@edit');
	Route::post('/proyecto/{id}','ProjectController@update');

	Route::get('/proyecto/{id}/eliminar','ProjectController@delete');
	Route::get('/proyecto/{id}/restaurar','ProjectController@restore');



	Route::get('/config','UserController@index');

});

