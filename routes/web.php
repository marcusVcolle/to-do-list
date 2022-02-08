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

Route::get('/', [App\Http\Controllers\TasksController::class, 'index'])->name('welcome');

Route::post('/task', [App\Http\Controllers\TasksController::class, 'store']);

Route::post('task/{id}/update',  [App\Http\Controllers\TasksController::class, 'update'])->name('update');

Route::get('/task/{id}', [App\Http\Controllers\TasksController::class, 'destroy'])->name('delete');