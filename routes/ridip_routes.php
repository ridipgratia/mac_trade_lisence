<?php

use App\Http\Controllers\trade\TradeLisenceController;
use Illuminate\Support\Facades\Route;

// ------------------- trade lisence routes --------------------
// ---------------- trade lisence index page -----------------
Route::get('/', [TradeLisenceController::class, 'index']);
// ----------------- add trade linsence index page  --------------

Route::get('/add-trade', [TradeLisenceController::class, 'addTrade']);
Route::get('/temp-file', [TradeLisenceController::class, 'tempFile']);
