<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;

Route::get('/', [TeamController::class, 'index'])->name('team.index');
Route::get('/team/{alt}', [TeamController::class, 'show'])->name('team.show');