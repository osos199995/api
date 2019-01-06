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




Route::resource('/makers','MakersController',['except'=>['edit','create']]);

Route::resource('/vehicles','VehiclesController',['only'=> ['index']]);

Route::resource('/makers.vehicles', 'MakerVehiclesController',['except'=>'edit','create']);