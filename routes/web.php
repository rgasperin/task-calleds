<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

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

Route::get('/', [CrudController::class, 'index']);
Route::get('chamados', [CrudController::class, 'calleds']);

Route::delete('chamados/{id}', [CrudController::class, 'destroy']);

Route::get('chamados/{id}/edit', [CrudController::class, 'edit']);
Route::put('chamados/{id}', [CrudController::class, 'update']);

Route::get('chamados/{id}', [CrudController::class, 'show']);

Route::get('novo-chamado/create', [CrudController::class, 'create']);
Route::post('chamados', [CrudController::class, 'store']);
