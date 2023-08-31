<?php

use Illuminate\Http\Request;
use App\Mail\PatientRegistered;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PatientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/user', function (Request $request) {
    Mail::to('franco@test.com')->send(new PatientRegistered);
});

Route::post('/patients', 'PatientController@store');
