<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

require __DIR__ . './ridip_routes.php';
require __DIR__ . './dipankor_routes.php';
// ------------------------ trade routes -------------------

Route::prefix('trade')->group(function () {
    require __DIR__ . './ridip_routes.php';
});
