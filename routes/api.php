<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MControl;
use App\Http\Controllers\BControl;
use App\Http\Controllers\JControl;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/getmahasiswa',[MControl::class, 'getmahasiswa']);
Route::post('/createmahasiswa',[MControl::class, 'createmahasiswa']);
Route::patch('/updatemahasiswa/{id}',[MControl::class, 'updatemahasiswa']);
Route::delete('/deletemahasiswa/{id}',[MControl::class, 'deletemahasiswa']);

Route::get('/getbuku',[BControl::class, 'getbuku']);
Route::post('/create',[BControl::class, 'create']);
Route::patch('/update/{id}',[BControl::class, 'update']);
Route::delete('/destroy/{id}',[BControl::class, 'destroy']);

Route::get('/getjurusan',[JControl::class, 'getjurusan']);
Route::post('/create',[JControl::class, 'create']);
Route::patch('/update/{id}',[JControl::class, 'update']);
Route::delete('/destroy/{id}',[JControl::class, 'destroy']);

