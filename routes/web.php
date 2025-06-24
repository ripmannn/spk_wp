<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\WPController;

// Kriteria Routes
Route::resource('criterias', CriteriaController::class);

// Alternatif Routes
Route::resource('alternatives', AlternativeController::class);

// Nilai Routes
Route::resource('scores', ScoreController::class)->except(['show']);
Route::get('/scores', [ScoreController::class, 'index'])->name('scores.index');
Route::get('/scores/create', [ScoreController::class, 'create'])->name('scores.create');
Route::post('/scores', [ScoreController::class, 'store'])->name('scores.store');
Route::get('/scores/{score}/edit', [ScoreController::class, 'edit'])->name('scores.edit');
Route::put('/scores/{score}', [ScoreController::class, 'update'])->name('scores.update');
Route::delete('/scores/{score}', [ScoreController::class, 'destroy'])->name('scores.destroy');

// WP Routes
Route::get('/wp', [WPController::class, 'index'])->name('wp.index');
Route::get('/wp/calculate', [WPController::class, 'calculate'])->name('wp.calculate');

// Home Route
Route::redirect('/', '/wp');

// Route::get('/', function () {
//     return view('welcome');
// });