<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KindController;
use App\Http\Controllers\AnimalController;

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
    return view('index');
});


Route::get('/animal_kinds', [KindController::class, 'index']);

Route::get('/animals', [AnimalController::class, 'store']);

Route::get('/animals/{name}', [AnimalController::class, 'show']);

Route::post('/animals', [AnimalController::class, 'index']);
Route::post('/animals/age', [AnimalController::class, 'index']);
