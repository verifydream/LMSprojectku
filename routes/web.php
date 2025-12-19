<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\FaqController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kategori', [MaterialController::class, 'index'])->name('materials.index');
Route::get('/materi/{slug}', [MaterialController::class, 'show'])->name('materials.show');
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
