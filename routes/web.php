<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\StateController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\CityController;
use \App\Http\Controllers\NeighbourhoodController;
use \App\Http\Controllers\PropertyTypeController;
use \App\Http\Controllers\PropertyController;
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
})->name('home');

require __DIR__.'/auth.php';


Route::middleware([])->group(function (){ //'auth' , 'auth.admin'
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    //---------- Users
    Route::resource('users' , UserController::class);
    //---------- States
    Route::resource('states' , StateController::class);
    //---------- Cities
    Route::resource('cities' , CityController::class);
    //---------- Neighbourhoods
    Route::resource('neighbourhoods' , NeighbourhoodController::class);
    //---------- Property Types
    Route::resource('propertyTypes' , PropertyTypeController::class);
    //---------- Properties
    Route::resource('properties' , PropertyController::class);
});

Route::middleware(['auth' , 'auth.super'])->group(function (){
    //----------- links for super admin dev

});