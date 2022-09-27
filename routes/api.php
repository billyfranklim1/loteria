<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DrawingController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/create-ticket', [TicketController::class, 'createTicket'])->name('create-ticket');
Route::get('/ticket/{ticketCode}', [TicketController::class, 'getTicket'])->name('get-ticket');

Route::resource('drawings', DrawingController::class);
