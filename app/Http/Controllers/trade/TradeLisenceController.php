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
    // ---------------------  add trade lisence index page ------------------------
    public function addTrade(Request $request)
    {
        return view('trade.add_trade_lisence');
    }
    public function tempFile(Request $request){
        return view('temp_file_upload');
    }
}
