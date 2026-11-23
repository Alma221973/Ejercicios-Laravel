<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LibroController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->middleware('throttle:6,1')->name('login.store');
Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
Route::get('/libros/create', [LibroController::class, 'create'])->name('libros.create');
Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');
Route::get('/libros/{id}/edit', [LibroController::class, 'edit'])->name('libros.edit');
Route::put('/libros/{id}', [LibroController::class, 'update'])->name('libros.update');
Route::delete('/libros/{id}', [LibroController::class, 'destroy'])->name('libros.destroy');
Route::middleware('auth')->group(function () { 
Route::get('/inicio', function() {return redirect()->route('libros.index');})->name('inicio'); 
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});