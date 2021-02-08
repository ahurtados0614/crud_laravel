<?php

use App\Http\Controllers\registroController;
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
Route::get('/inicio',[registroController::class, 'index']);
Route::post('/inicio',[registroController::class, 'index']);
Route::post('/registro',[registroController::class,'store']);
Route::post('/borrar',[registroController::class,'destroy']);
Route::post('/actualizar',[registroController::class,'update']);
Route::get('/borrar/{id}',[registroController::class,'destroy']);

