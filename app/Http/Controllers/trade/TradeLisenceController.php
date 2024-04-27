<?php

namespace App\Http\Controllers\trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TradeLisenceController extends Controller
{
    // -------------------- trade lisence index page -------------------
    public function index(Request $request)
    {
        return view('trade.trade_lisence');
    }
}
