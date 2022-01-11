<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/contacts', [App\Http\Controllers\ContactsController::class, 'get']); 
Route::get('/conversation/{id}', [App\Http\Controllers\ContactsController::class, 'getMessagesFor']); 
Route::post('/conversation/send', [App\Http\Controllers\ContactsController::class, 'send']); 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


