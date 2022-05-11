<?php

use App\Services\Format\CSVFormat;
use App\Services\Format\PDFFormat;
use App\Services\Order\OrderReport;
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
    $orders = (new OrderReport)->orderBetween(now()->subMonths(6), now());

    return (new PDFFormat())->format($orders);
});
