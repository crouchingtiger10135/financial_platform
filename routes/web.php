<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DocumentController;

Route::get('/', [ClientController::class, 'index']);
Route::post('/clients', [ClientController::class, 'store']);
Route::post('/documents', [DocumentController::class, 'store']);
