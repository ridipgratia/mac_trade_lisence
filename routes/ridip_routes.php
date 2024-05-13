<?php

use App\Http\Controllers\trade\TradeLisenceController;
use Illuminate\Support\Facades\Route;

// ------------------- trade lisence routes --------------------
// ---------------- trade lisence index page -----------------
Route::get('/', [TradeLisenceController::class, 'index']);
// ----------------- add trade linsence index page  --------------

Route::get('/add-trade', [TradeLisenceController::class, 'addTrade']);
Route::post('/add-trade-post', [TradeLisenceController::class, 'addTradePost']);

// ------------------- tempory routes ---------------------
Route::get('/temp-file', [TradeLisenceController::class, 'tempFile']);
Route::post('/file-upload-post', [TradeLisenceController::class, 'fileUploadPost']);
