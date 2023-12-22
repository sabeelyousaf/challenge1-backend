<?php

use App\Http\Controllers\Api\Testing;
use App\Http\Controllers\Api\TestingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AttendenceController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('upload-attendance', [AttendenceController::class, 'uploadAttendance']);
Route::get('view-attendance/{id}', [AttendenceController::class, 'viewAttendence']);
Route::get('show-attendance', [AttendenceController::class, 'showAttendance']);



