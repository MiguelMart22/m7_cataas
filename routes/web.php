<?php

use App\Http\Controllers\CatImageController;
use App\Models\CatImage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cats',[CatImageController::class, 'index']);
Route::post('/cats',[CatImageController::class, 'store']);
Route::post('/cats/{catImage}',[CatImageController::class, 'show']);