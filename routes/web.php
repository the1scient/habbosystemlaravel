<?php

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


Route::group(['middleware' => 'web'], function() {


    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});

Route::get('/usuarios', [App\Http\Controllers\UsuariosController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/novo', [App\Http\Controllers\UsuariosController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios/add', [App\Http\Controllers\UsuariosController::class, 'add'])->name('usuarios.add');
Route::get('/usuarios/{id}/editar', [App\Http\Controllers\UsuariosController::class, 'edit'])->name('usuarios.edit');
Route::post('/usuarios/{id}/update', [App\Http\Controllers\UsuariosController::class, 'update'])->name('usuarios.update');
Route::get('/usuarios/{id}/delete', [App\Http\Controllers\UsuariosController::class, 'delete'])->name('usuarios.delete');
