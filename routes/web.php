<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\StateController;
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


Route::middleware(['auth' , 'auth.admin'])->group(function (){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    //---------- Users
    Route::resources('users' , StateController::class);
    //---------- States
    Route::resources('states' , StateController::class);
    //---------- Cities
    Route::resources('cities' , StateController::class);
    //---------- Neighbourhoods
    Route::resources('neighbourhoods' , StateController::class);
    //---------- Property Types
    Route::resources('propertyTypes' , StateController::class);
    //---------- Properties
    Route::resources('properties' , StateController::class);
});

Route::middleware(['auth' , 'auth.super'])->group(function (){
    //----------- links for super admin dev

});