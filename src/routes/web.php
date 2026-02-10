<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', [ContactController::class, 'index']);
Route::post('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/search', [AdminController::class, 'search']);
Route::get('/reset', [AdminController::class, 'reset']);
Route::delete('/admin/{id}', [AdminController::class, 'destroy']);
