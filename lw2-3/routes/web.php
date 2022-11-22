<?php

use App\Http\Controllers\NoteController;
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
    return view('notes/layout');
});

Route::get('notes', [NoteController::class, 'index'])->name('note.index');
Route::post('notes', [NoteController::class, 'store'])->name('note.store');
Route::get('notes/create', [NoteController::class, 'create'])->name('note.create');
Route::get('notes/{note}/edit', [NoteController::class, 'edit'])->name('note.edit');
Route::put('notes/{note}', [NoteController::class, 'update'])->name('note.update');
Route::delete('notes/{note}', [NoteController::class, 'destroy'])->name('note.destroy');
Route::get('notes/{note}/show', [NoteController::class, 'show'])->name('note.show');
