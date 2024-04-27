<?php

use App\Http\Controllers\trade\TradeLisenceController;
use Illuminate\Support\Facades\Route;

// ------------------- trade lisence routes --------------------
// ---------------- trade lisence index page -----------------
Route::get('/trade', [TradeLisenceController::class, 'index']);
