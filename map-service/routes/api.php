<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;

Route::get('/search', [LocationController::class, 'search']);
Route::post('/locations', [LocationController::class, 'store']);
