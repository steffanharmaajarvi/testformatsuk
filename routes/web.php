<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;

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

Route::get('/', [ContactController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/dashboard', [ContactController::class, 'index'])->middleware('auth');


Route::get('/signup', [AuthController::class, 'register']);
Route::post('/signup', [AuthController::class, 'proceedRegister']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'proceedLogin']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::post('/add-contact', [ContactController::class, 'add'])->middleware('auth');
Route::get('/take-contact/{id}', [ContactController::class, 'takeContact'])->middleware('auth');
Route::get('/delete-contact/{id}', [ContactController::class, 'deleteContact'])->middleware('auth');
Route::get('/my-contacts', [ContactController::class, 'myContacts'])->middleware('auth');






