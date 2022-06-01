<?php

use App\Jobs\CompanyCreatedJob;
use App\Mail\CompanyCreatedWelcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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

Route::get('/teste', function() {
    CompanyCreatedJob::dispatch('teste@teste.com')->onQueue('micro_email');

    return response()->json(['success' => true]);
});

Route::get('/', function() {
    return response()->json(["message" => 'success']);
});
