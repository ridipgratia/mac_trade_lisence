<?php

use App\Http\Controllers\trade\TradeLisenceController;
use Illuminate\Support\Facades\Route;

Route::get('/trade_form', function () {
    return view('trade.trade_license_form');
});