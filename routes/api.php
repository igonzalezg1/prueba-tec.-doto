<?php

use App\Http\Controllers\Api\Comentarios\ComentariosController;
use App\Http\Controllers\Api\Publicaciones\PublicacionesController;
use App\Http\Controllers\Api\Publicaciones\PublicacionesComentariosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::resource('publicaciones', PublicacionesController::class, ['except' => ['create', 'edit']]);

Route::resource('comentarios', ComentariosController::class, ['except' => ['create', 'edit']]);

Route::resource('publicaciones.comentarios', PublicacionesComentariosController::class, ['only' => ['index']]);
